@extends('admin.layouts.app')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-2xl mx-auto bg-base-100 rounded-box shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Edit User</h2>

            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->

                {{-- Nama Lengkap --}}
                <div class="form-control">
                    <label class="label" for="name">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="input input-bordered w-full @error('name') input-error @enderror" required>
                    @error('name')
                        <span class="text-sm text-error mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="input input-bordered w-full @error('email') input-error @enderror" required>
                    @error('email')
                        <span class="text-sm text-error mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Role --}}
                <div class="form-control">
                    <label class="label" for="role">
                        <span class="label-text">Role</span>
                    </label>
                    <select id="role" name="role"
                        class="select select-bordered w-full @error('role') select-error @enderror" required>
                        <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Student
                        </option>
                        <option value="teacher" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>Teacher
                        </option>
                    </select>
                    @error('role')
                        <span class="text-sm text-error mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text">Password (Leave blank to keep current password)</span>
                    </label>
                    <input id="password" type="password" name="password"
                        class="input input-bordered w-full @error('password') input-error @enderror">
                    @error('password')
                        <span class="text-sm text-error mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="form-control">
                    <label class="label" for="password_confirmation">
                        <span class="label-text">Konfirmasi Password</span>
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        class="input input-bordered w-full">
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-2 pt-4">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
