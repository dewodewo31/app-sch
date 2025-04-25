<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.majors.index')->with([
            'major' => Major::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddMajorRequest $request)
    {
        if ($request->validated()) {
            Major::create($request->validated());
            return redirect()->route('admin.majors.index')->with([
                'success' => 'Data Jurusan Berhasil di Simpan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('admin.majors.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        if ($request->validated()) {
            $major->update($request->validated());
            return redirect()->route('admin.majors.edit')->with([
                'success' => 'Data Berhasil  di Update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->route('admin.majors.index')->with([
            'success' => 'Data Berhasil di Hapus'
        ]);
    }
}
