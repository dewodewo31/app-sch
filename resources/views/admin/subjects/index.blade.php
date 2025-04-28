@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Mata Pelajaran</h1>
            <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Baru
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-base-100 rounded-lg shadow">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>Nama Mata Pelajaran</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subjects as $subject)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('admin.subjects.edit', $subject) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-error"
                                                onclick="return confirm('Yakin menghapus data?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center p-4">Belum ada data mata pelajaran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
