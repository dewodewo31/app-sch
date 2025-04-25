<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function index(Request $request)
    {
        $search = $request->input('search');

        $teachers = Teacher::with(['user', 'subject'])
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('admin.teachers.index', [
            'teachers' => $teachers,
            'subjects' => Subject::all(),
        ]);
    }
}
