@extends('admin.layouts.app')

@section('title')
    Tambah User Baru
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-2xl mx-auto bg-base-100 rounded-box shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Tambah User Baru</h2>

            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="form-control">
                    <label class="label" for="name">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
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
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
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
                        <option value="student" {{ old('role', 'student') == 'student' ? 'selected' : '' }}>Student</option>
                        <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    </select>
                    @error('role')
                        <span class="text-sm text-error mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text">Password</span>
                    </label>
                    <input id="password" type="password" name="password"
                        class="input input-bordered w-full @error('password') input-error @enderror" required>
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
                        class="input input-bordered w-full" required>
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
