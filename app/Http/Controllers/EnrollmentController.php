<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\Classroom;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ganti get() dengan paginate()
        $enrollments = Enrollment::with(['student', 'classroom'])
            ->latest()
            ->paginate(10); // Sesuaikan angka 10 dengan jumlah item per halaman

        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $classrooms = Classroom::with('major')->get();
        return view('admin.enrollments.create', compact('students', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Tambahkan validasi
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'classroom_id' => 'required|exists:classrooms,id'
        ]);

        Enrollment::create($validated);

        return redirect()->route('admin.enrollments.index')->with([
            'success' => 'Data Enrollment Berhasil di Simpan'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        $enrollment->load(['student', 'classroom.major', 'classroom.teacher']);
        return view('admin.enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        $students = Student::all();
        $classrooms = Classroom::all();
        return view('admin.enrollments.edit', compact('enrollment', 'students', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->validated());

        // Perbaiki redirect ke index
        return redirect()->route('admin.enrollments.index')->with([
            'success' => 'Data Enrollment di Update'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('admin.enrollments.index')->with([
            'success' => 'Data Enrollment di Hapus'
        ]);
    }
}
