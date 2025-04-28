@extends('admin.layouts.app')

@section('content')
    <div class="min-h-screen p-8 bg-base-to-br from-gray-900 to-gray-800 text-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-4xl font-bold tracking-tight">Profil Siswa</h1>
                <a href="{{ route('admin.students.index') }}" class="btn btn-ghost hover:bg-gray-700">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>

            <!-- Profile Card -->
            <div class="card bg-gray-700 shadow-2xl mb-8">
                <div class="card-body">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Photo Section -->
                        <div class="w-full md:w-1/4">
                            <div class="avatar hover:scale-105 transition-transform duration-300">
                                <div class="w-full rounded-2xl shadow-lg">
                                    @if ($student->photo)
                                        <img src="{{ asset('storage/' . $student->photo) }}" alt="Foto Siswa"
                                            class="w-full h-64 object-cover rounded-2xl">
                                    @else
                                        <div class="bg-gray-600 w-full h-64 rounded-2xl flex items-center justify-center">
                                            <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg"
                                                class="w-12 h-12 rounded-full object-cover"
                                                alt="Foto default {{ $student->name }}">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Personal Info -->
                        <div class="flex-1 space-y-6">
                            <h2 class="text-3xl font-bold mb-4 border-b-2 border-gray-400 pb-2">
                                {{ $student->name }}
                                <span class="text-lg ml-2 text-gray-300">#{{ $student->id }}</span>
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Personal Details -->
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-venus-mars text-gray-300 w-8"></i>
                                        <span class="font-semibold">Jenis Kelamin:</span>
                                        <span class="ml-2">{{ $student->gender ?? 'N/A' }}</span>
                                    </div>

                                    <div class="flex items-center">
                                        <i class="fas fa-birthday-cake text-gray-300 w-8"></i>
                                        <span class="font-semibold">Tanggal Lahir:</span>
                                        <span class="ml-2">
                                            {{ $student->birth_place ?? 'N/A' }},
                                            {{ $student->birth_date?->format('d F Y') ?? 'N/A' }}
                                        </span>
                                    </div>

                                    <div class="flex items-center">
                                        <i class="fas fa-map-marker-alt text-gray-300 w-8"></i>
                                        <span class="font-semibold">Alamat:</span>
                                        <span class="ml-2">{{ $student->address ?? 'N/A' }}</span>
                                    </div>
                                </div>

                                <!-- Contact & Academic -->
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-mobile-alt text-gray-300 w-8"></i>
                                        <span class="font-semibold">Nomor HP:</span>
                                        <span class="ml-2">{{ $student->phone ?? 'N/A' }}</span>
                                    </div>

                                    <div class="flex items-center">
                                        <i class="fas fa-praying-hands text-gray-300 w-8"></i>
                                        <span class="font-semibold">Agama:</span>
                                        <span class="ml-2">{{ $student->religion ?? 'N/A' }}</span>
                                    </div>

                                    <div class="flex items-center">
                                        <i class="fas fa-chalkboard-teacher text-gray-300 w-8"></i>
                                        <span class="font-semibold">Kelas:</span>
                                        <span class="ml-2">
                                            {{ $student->classroom?->name ?? 'Belum Ditentukan' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Academic Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Enrollment Section yang Disederhanakan -->
                <div class="card bg-gray-700 shadow-xl">
                    <div class="card-body">
                        <h3 class="card-title mb-6 text-2xl">
                            <i class="fas fa-calendar-alt mr-2"></i>Riwayat Akademik
                        </h3>

                        @if ($student->enrollments->count() > 0)
                            <div class="space-y-4">
                                @foreach ($student->enrollments as $enrollment)
                                    <div class="bg-gray-600 p-4 rounded-lg hover:bg-gray-500 transition-colors">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-bold text-lg">Tahun Ajaran {{ $enrollment->academic_year }}
                                                </h4>
                                                <p class="text-sm text-gray-300">
                                                    Semester {{ $enrollment->semester }}
                                                </p>
                                            </div>
                                            <span class="badge badge-primary">
                                                Kelas: {{ $enrollment->classroom->name }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle mr-2"></i>
                                Belum ada riwayat akademik
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Submissions Section -->
                <div class="card bg-gray-700 shadow-xl">
                    <div class="card-body">
                        <h3 class="card-title mb-6 text-2xl">
                            <i class="fas fa-tasks mr-2"></i>Pengumpulan Terakhir
                        </h3>

                        @if ($student->submissions->count() > 0)
                            <div class="space-y-4">
                                @foreach ($student->submissions->take(5) as $submission)
                                    <div class="bg-gray-600 p-4 rounded-lg hover:bg-gray-500 transition-colors">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-bold">{{ $submission->assignment->title }}</h4>
                                                <p class="text-sm text-gray-300">
                                                    Dikumpulkan: {{ $submission->submitted_at->diffForHumans() }}
                                                </p>
                                            </div>
                                            <span
                                                class="badge {{ $submission->status === 'approved' ? 'badge-success' : 'badge-warning' }}">
                                                {{ ucfirst($submission->status) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle mr-2"></i>
                                Belum ada pengumpulan tugas
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
