@extends('admin.layouts.app')

@section('title', 'Daftar Guru')

@section('content')
    <div class="p-4">
        <div class="flex flex-col gap-6">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Manajemen Guru</h2>
            </div>
            <!-- Search -->
            <form method="GET" action="{{ route('admin.teachers.index') }}" class="flex gap-2 mb-4">
                <input type="text" name="search" placeholder="Cari nama guru..." value="{{ request('search') }}"
                    class="input input-bordered w-full max-w-xs" />
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <!-- Table -->
            <div class="overflow-x-auto rounded-box shadow">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Mata Pelajaran</th>
                            <th>Sertifikasi</th>
                            <th>Akun</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($teachers->isEmpty())
                            <tr>
                                <td colspan="12">
                                    <div role="alert" class="alert alert-error">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Data Guru Tidak Ditemukan</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($teacher->photo)
                                        <img src="{{ asset('storage/' . $teacher->photo) }}"
                                            class="w-12 h-12 rounded-full object-cover">
                                    @else
                                        <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg"
                                            class="w-12 h-12 rounded-full object-cover">
                                    @endif
                                </td>
                                <td>{{ $teacher->name }}</td>
                                <td>
                                    {{ $teacher->birth_place }},
                                    {{ $teacher->birth_date->format('d/m/Y') }}
                                </td>
                                <td>{{ Str::limit($teacher->address, 20) }}</td>
                                <td>{{ $teacher->phone ?? '-' }}</td>
                                <td>{{ $teacher->subject->name ?? '-' }}</td>
                                <td>
                                    <span
                                        class="badge {{ $teacher->certificate_number && $teacher->certificate_number !== '-' ? 'badge-success' : 'badge-warning' }}">
                                        {{ $teacher->certificate_number && $teacher->certificate_number !== '-' ? 'Bersertifikat' : 'Belum Ada Sertifikat' }}
                                    </span>
                                </td>
                                <td>{{ $teacher->user->email ?? '-' }}</td>
                                <td>{{ $teacher->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
