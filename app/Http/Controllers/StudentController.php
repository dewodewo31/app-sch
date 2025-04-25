<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input dari form

        $students = Student::with(['user', 'classroom'])
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('admin.students.index', [
            'students' => $students,
            'classrooms' => Classroom::all(),
        ]);
    }
}
