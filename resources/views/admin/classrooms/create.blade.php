@extends('admin.layouts.app')

@section('title')
    Buat Kelas
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="card-title">Tambah Kelas Baru</h2>

                    <form action="{{ route('admin.classrooms.store') }}" method="POST">
                        @csrf

                        {{-- Nama Kelas --}}
                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Nama Kelas</span>
                            </label>
                            <input type="text" name="name" class="input input-bordered w-full"
                                placeholder="Contoh: X IPA 1" required>
                        </div>

                        {{-- Tingkat Kelas & Tahun Ajaran --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Tingkat Kelas</span>
                                </label>
                                <select name="grade_level" class="select select-bordered w-full" required>
                                    <option value="10">Kelas 10</option>
                                    <option value="11">Kelas 11</option>
                                    <option value="12">Kelas 12</option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Tahun Ajaran</span>
                                </label>
                                <input type="text" name="academic_year" class="input input-bordered w-full"
                                    placeholder="Contoh: 2023/2024" required>
                            </div>
                        </div>

                        {{-- Jurusan --}}
                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Jurusan</span>
                            </label>
                            <select name="major_id"
                                class="select select-bordered w-full @error('major_id') select-error @enderror" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ old('major_id') == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Wali Kelas --}}
                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Wali Kelas</span>
                            </label>
                            <select name="teacher_id" class="select select-bordered w-full" required>
                                <option value="">Pilih Guru</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- Tombol --}}
                        <div class="flex justify-end gap-4 mt-6">
                            <a href="{{ route('admin.classrooms.index') }}" class="btn btn-ghost">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
