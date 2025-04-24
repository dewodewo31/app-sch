@extends('admin.layouts.app')

@section('title')
    Manajemen User
@endsection

@section('content')
    <div class="p-4">
        <div class="flex flex-col gap-8">
            <!-- Header & Add Button -->
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Daftar Pengguna</h2>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Tambah User
                </a>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success shadow-lg">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto rounded-box shadow">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge badge-{{ $user->role === 'admin' ? 'primary' : 'success' }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-error"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-8">
                                    <div class="text-gray-500">Belum ada data user</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
