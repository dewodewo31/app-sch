<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;


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
        if ($request->validated()) {
            User::create($request->validated());
            return redirect()->route('admin.users.index')->with([
                'success' => 'Data User Berhasil Tersimpan'
            ]);
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
