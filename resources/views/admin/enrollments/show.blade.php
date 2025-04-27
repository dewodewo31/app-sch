@extends('admin.layouts.app')

@section('title', 'Detail Enrollment')

@section('content')
    <div class="p-4">
        <div class="max-w-4xl mx-auto bg-base-100 rounded-box shadow-lg p-6">
            <div class="flex justify-between items-start mb-6">
                <h2 class="text-2xl font-bold">Detail Enrollment</h2>
                <a href="{{ route('admin.enrollments.index') }}" class="btn btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Student Information -->
                <div class="bg-base-200 p-4 rounded-box">
                    <h3 class="text-lg font-semibold mb-4">Informasi Siswa</h3>
                    <div class="space-y-2">
                        <div>
                            <label class="text-sm text-gray-500">Nama Lengkap</label>
                            <p class="font-medium">{{ $enrollment->student->name }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Tanggal Lahir</label>
                            <p class="font-medium">
                                {{ $enrollment->student->birth_place }},
                                {{ $enrollment->student->birth_date->format('d F Y') }}
                            </p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Alamat</label>
                            <p class="font-medium">{{ $enrollment->student->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Classroom Information -->
                <div class="bg-base-200 p-4 rounded-box">
                    <h3 class="text-lg font-semibold mb-4">Informasi Kelas</h3>
                    <div class="space-y-2">
                        <div>
                            <label class="text-sm text-gray-500">Nama Kelas</label>
                            <p class="font-medium">{{ $enrollment->classroom->name }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Tingkat Kelas</label>
                            <p class="font-medium">{{ $enrollment->classroom->grade_level }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Tahun Akademik</label>
                            <p class="font-medium">{{ $enrollment->classroom->academic_year }}</p>
                        </div>
                        <div>
                            <label class="text-sm text-gray-500">Jurusan</label>
                            <p class="font-medium">{{ $enrollment->classroom->major->name ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enrollment Metadata -->
            <div class="mt-6 pt-4 border-t border-base-300">
                <div class="flex flex-wrap gap-4 text-sm">
                    <div>
                        <span class="text-gray-500">Tanggal Enrollment:</span>
                        <span class="font-medium">
                            {{ $enrollment->created_at->translatedFormat('l, d F Y H:i') }}
                        </span>
                    </div>
                    <div>
                        <span class="text-gray-500">Terakhir Update:</span>
                        <span class="font-medium">
                            {{ $enrollment->updated_at->translatedFormat('l, d F Y H:i') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
