@extends('admin.layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="p-4">
        <div class="flex flex-col gap-6">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Manajemen Siswa</h2>
            </div>
            <form method="GET" action="{{ route('admin.students.index') }}" class="flex gap-2 mb-4">
                <input type="text" name="search" placeholder="Cari nama siswa..." value="{{ request('search') }}"
                    class="input input-bordered w-full max-w-xs" />
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <!-- Table -->
            <div class="overflow-x-auto rounded-box shadow">
                <table class="table table-zebra">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email (Akun)</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Lahir</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Nomor HP</th>
                            <th>Kelas</th>
                            <th>Foto</th>
                            <th>Dibuat Pada</th>
                            <th class="text-center">Aksi</th> <!-- Tambah kolom aksi -->
                        </tr>
                    </thead>
                    <tbody>
                        @if ($students->isEmpty())
                            <tr>
                                <td colspan="13"> <!-- Update colspan menjadi 13 -->
                                    <div role="alert" class="alert alert-error">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Data Siswa Tidak Ditemukan</span>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->user->email ?? '-' }}</td>
                                <td>{{ $student->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $student->birth_date->format('d/m/Y') }}</td>
                                <td>{{ $student->birth_place }}</td>
                                <td>{{ Str::limit($student->address, 20) }}</td>
                                <td>{{ $student->religion }}</td>
                                <td>{{ $student->phone ?? '-' }}</td>
                                <td>
                                    {{ $student->classroom->name ?? '-' }}<br>
                                    <small class="text-xs opacity-75">
                                        Tingkat: {{ $student->classroom->grade_level ?? '-' }}<br>
                                        Tahun Ajaran: {{ $student->classroom->academic_year ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    @if ($student->photo)
                                        <img src="{{ asset('storage/' . $student->photo) }}"
                                            class="w-12 h-12 rounded-full object-cover"
                                            alt="Foto profil {{ $student->name }}">
                                    @else
                                        <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg"
                                            class="w-12 h-12 rounded-full object-cover"
                                            alt="Foto default {{ $student->name }}">
                                    @endif
                                </td>
                                <td>{{ $student->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="flex justify-center gap-2">
                                        <!-- Tombol Detail -->
                                        <a href="{{ route('admin.students.show', $student) }}"
                                            class="btn btn-square btn-sm btn-info hover:scale-105 transition-transform">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
