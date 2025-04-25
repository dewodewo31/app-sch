<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.classrooms.index')->with([
            'classroom' => Classroom::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        $majors = Major::all();
        return view('admin.classrooms.create',  compact('teachers', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddClassroomRequest $request)
    {
        if ($request->validated()) {
            Classroom::create($request->validated());

            return redirect()->route('admin.classrooms.index')->with([
                'success' => 'Data Kelas Berhasil Tersimpan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        $majors = Major::all(); // Fetch all majors
        $teachers = Teacher::all(); // Fetch all teachers

        return view('admin.classrooms.edit')->with([
            'classroom' => $classroom,
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        if ($request->validated()) {
            $classroom->update($request->validated());
            return redirect()->route('admin.classrooms.index')->with([
                'success' => 'Data Kelas Berhasil Diedit'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('admin.classrooms.index')->with([
            'success' => 'Data Kelas Berhasil Dihapus'
        ]);
    }
}
