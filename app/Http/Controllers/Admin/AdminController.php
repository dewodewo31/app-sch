<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\Order;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan data statistik order:
     * - Hari ini
     * - Kemarin
     * - Bulan ini
     * - Tahun ini
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua order berdasarkan tanggal tertentu
        $monthTeachers = Teacher::whereMonth('created_at', Carbon::now()->month)->get(); // Guru yang join Bulan ini
        $yearTeachers = Teacher::whereYear('created_at', Carbon::now()->year)->get(); // Guru yang join Tahun ini
        $monthStudents = Student::whereMonth('created_at', Carbon::now()->month)->get(); // Bulan ini
        $yearStudents = Student::whereYear('created_at', Carbon::now()->year)->get(); // Tahun ini

        $totalMajors = Major::count();
        $totalClassrooms = Classroom::count();
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        // Kirim data ke view admin.index
        return view('admin.index')->with([
            'monthTeachers' => $monthTeachers,
            'yearTeachers' => $yearTeachers,
            'monthStudents' => $monthStudents,
            'yearStudents' => $yearStudents,
            'totalMajors' => $totalMajors,
            'totalClassrooms' => $totalClassrooms,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents
        ]);
    }

    /**
     * Menampilkan halaman login jika admin belum login,
     * jika sudah login maka redirect ke dashboard admin.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        if (!auth()->guard('admin')->check()) {
            // Jika belum login, tampilkan halaman login
            return view('admin.login');
        }

        // Jika sudah login, langsung ke dashboard
        return redirect()->route('admin.index');
    }

    /**
     * Menangani proses login admin setelah form dikirim.
     * Validasi dari FormRequest (AuthAdminRequest)
     *
     * @param AuthAdminRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(AuthAdminRequest $request)
    {
        // Jika data valid
        if ($request->validated()) {
            // Coba login dengan guard admin
            if (auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                // Jika sukses login, redirect ke dashboard
                $request->session()->regenerate(); // amankan session
                return redirect()->route('admin.index');
            } else {
                // Kalau gagal login, kirim pesan error balik ke login
                return redirect()->route('admin.login')->with([
                    'error' => 'Email dan Password Tidak Terdaftar Kedalam Sistem Kami!'
                ]);
            }
        }
    }

    /**
     * Logout admin dari sistem dan redirect ke halaman utama admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Logout session guard admin
        auth()->guard('admin')->logout();

        // Redirect ke halaman admin utama (biasanya login lagi)
        return redirect()->route('admin.index');
    }
}
