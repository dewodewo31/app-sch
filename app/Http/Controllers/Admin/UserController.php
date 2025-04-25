<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index')->with([
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();

            // Buat User
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => $validated['role'],
            ]);

            // Handle Student
            if ($user->role === 'student') {
                $classroom = Classroom::firstOrFail();

                Student::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'classroom_id' => $classroom->id,
                    'gender' => 'L',
                    'birth_date' => now(),
                    'birth_place' => '-',
                    'address' => '-',
                    'religion' => 'Islam'
                ]);
            }

            // Handle Teacher
            if ($user->role === 'teacher') {
                $subject = Subject::firstOrFail();

                Teacher::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'subject_id' => $subject->id,
                    'birth_date' => now(),
                    'birth_place' => '-',
                    'address' => '-',
                    'certificate_number' => '-'
                ]);
            }

            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Gagal membuat user: ' . $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $student = $user->student;
        $teacher = $user->teacher;

        return view('admin.users.edit')->with([
            'user' => $user,
            'student' => $student,
            'teacher' => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Validate the request
        $validated = $request->validated();

        // Update the user
        $user->update($validated);

        // Handle Student
        if ($user->role === 'student') {
            $student = $user->student; // Retrieve the associated student record
            $student->update([
                'name' => $validated['name'], // Update name from validated data
                'gender' => $request->input('gender') ?? 'Not-Picked', // Assuming you have this field in your request
                'birth_date' => $request->input('birth_date', '01/01/2000'), // Assuming you have this field in your request
                'birth_place' => $request->input('birth_place', '-'), // Default to '-' if not provided
                'address' => $request->input('address', '-'), // Default to '-' if not provided
                'religion' => $request->input('religion', '-'), // Default to 'Islam' if not provided
                'phone' => $request->input('phone'), // Optional field
                'photo' => $request->input('photo'), // Optional field
                // Add any other fields you want to update
            ]);
        }

        // Handle Teacher
        if ($user->role === 'teacher') {
            $teacher = $user->teacher; // Ambil record guru yang terkait
            $teacher->update([
                'name' => $validated['name'], // Perbarui nama dari data yang divalidasi
                'birth_date' => $request->input('birth_date', '01/01/2000'), // Gunakan NULL jika tidak ada nilai
                'birth_place' => $request->input('birth_place', '-'), // Default ke '-' jika tidak ada
                'address' => $request->input('address', '-'), // Default ke '-' jika tidak ada
                'phone' => $request->input('phone'), // Field opsional
                'photo' => $request->input('photo'), // Field opsional
                'certificate_number' => $request->input('certificate_number', '-'), // Gunakan '-' jika tidak ada nilai
                'certification_date' => $request->input('certification_date') ?: null, // Gunakan NULL jika tidak ada nilai
                'certification_institution' => $request->input('certification_institution', '-'), // Default ke '-' jika tidak ada
                // Tambahkan field lain yang ingin Anda perbarui
            ]);
        }

        return redirect()->route('admin.users.index')->with([
            'success' => 'Data User Berhasil Diedit'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with([
            'success' => 'Data User Berhasil Dihapus'
        ]);
    }
}
