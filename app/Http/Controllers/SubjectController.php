<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subjects.index')->with([
            'subjects' => Subject::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSubjectRequest $request)
    {
        if ($request->validated()) {
            Subject::create($request->validated());
            return redirect()->route('admin.subjects.index')->with([
                'success' => 'Data Pelajaran Berhasil disimpan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('admin.subjects.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        if ($request->validated()) {
            $subject->update($request->validated());
            return redirect()->route('admin.subjects.index')->with([
                'success' => 'Data Pelajaran Berhasil diubah'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('admin.subjects.index')->with([
            'success' => 'Data Pelajaran Berhasil dihapus'
        ]);
    }
}
