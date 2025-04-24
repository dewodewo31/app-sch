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
        return view('admin.users.edit')->with([
            'user' => $user
        ]);;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if ($request->validated()) {
            $user->update($request->validated());
            return redirect()->route('admin.users.index')->with([
                'success' => 'Data User Berhasil Diedit'
            ]);
        }
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
