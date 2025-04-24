@extends('admin.layouts.app')

@section('title')
    Dashboard Admin
@endsection

@section('content')
    <div class="p-4">
        <div class="flex flex-col gap-8">
            <!-- Header -->
            <div class="bg-base-100 p-4 rounded-box shadow-sm">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Total Guru -->
                <div class="card bg-base-100 shadow-md border border-info">
                    <div class="card-body">
                        <div class="flex items-center gap-4">
                            <div class="text-info">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm opacity-50">Total Guru</div>
                                <div class="text-2xl font-bold">{{ $totalTeachers }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Siswa -->
                <div class="card bg-base-100 shadow-md border border-success">
                    <div class="card-body">
                        <div class="flex items-center gap-4">
                            <div class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm opacity-50">Total Siswa</div>
                                <div class="text-2xl font-bold">{{ $totalStudents }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Jurusan -->
                <div class="card bg-base-100 shadow-md border border-warning">
                    <div class="card-body">
                        <div class="flex items-center gap-4">
                            <div class="text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm opacity-50">Total Jurusan</div>
                                <div class="text-2xl font-bold">{{ $totalMajors }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Kelas -->
                <div class="card bg-base-100 shadow-md border border-error">
                    <div class="card-body">
                        <div class="flex items-center gap-4">
                            <div class="text-error">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm opacity-50">Total Kelas</div>
                                <div class="text-2xl font-bold">{{ $totalClassrooms }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Statistik Guru -->
            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-semibold flex items-center gap-2">
                    <i class="fas fa-chalkboard-teacher text-primary"></i>
                    Statistik Guru
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Guru Bulan Ini -->
                    <div class="card bg-base-100 shadow-md border border-primary">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <span class="badge badge-primary font-bold">Bulan Ini</span>
                                    <span class="text-sm">Guru Baru</span>
                                </div>
                                <div class="stat-value text-primary">
                                    {{ $monthTeachers->count() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Guru Tahun Ini -->
                    <div class="card bg-base-100 shadow-md border border-secondary">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <span class="badge badge-secondary font-bold">Tahun Ini</span>
                                    <span class="text-sm">Guru Baru</span>
                                </div>
                                <div class="stat-value text-secondary">
                                    {{ $yearTeachers->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik Siswa -->
            <div class="flex flex-col gap-4">
                <h3 class="text-xl font-semibold flex items-center gap-2">
                    <i class="fas fa-user-graduate text-accent"></i>
                    Statistik Siswa
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Siswa Bulan Ini -->
                    <div class="card bg-base-100 shadow-md border border-accent">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <span class="badge badge-accent font-bold">Bulan Ini</span>
                                    <span class="text-sm">Siswa Baru</span>
                                </div>
                                <div class="stat-value text-accent">
                                    {{ $monthStudents->count() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Siswa Tahun Ini -->
                    <div class="card bg-base-100 shadow-md border border-warning">
                        <div class="card-body">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <span class="badge badge-warning font-bold">Tahun Ini</span>
                                    <span class="text-sm">Siswa Baru</span>
                                </div>
                                <div class="stat-value text-warning">
                                    {{ $yearStudents->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
