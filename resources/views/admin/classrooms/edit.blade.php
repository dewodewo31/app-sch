@extends('admin.layouts.app')

@section('title')
    Edit Kelas
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="card-title">Edit Data Kelas</h2>

                    <form action="{{ route('admin.classrooms.update', $classroom) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Nama Kelas</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name', $classroom->name) }}"
                                placeholder="Contoh: X IPA 1" class="input input-bordered w-full" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Tingkat Kelas</span>
                                </label>
                                <select name="grade_level" class="select select-bordered w-full" required>
                                    <option value="10" {{ $classroom->grade_level == 10 ? 'selected' : '' }}>Kelas 10
                                    </option>
                                    <option value="11" {{ $classroom->grade_level == 11 ? 'selected' : '' }}>Kelas 11
                                    </option>
                                    <option value="12" {{ $classroom->grade_level == 12 ? 'selected' : '' }}>Kelas 12
                                    </option>
                                </select>
                            </div>

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Tahun Ajaran</span>
                                </label>
                                <input type="text" name="academic_year"
                                    value="{{ old('academic_year', $classroom->academic_year) }}"
                                    placeholder="Contoh: 2023/2024" class="input input-bordered w-full" required>
                            </div>
                        </div>

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Jurusan</span>
                            </label>
                            <select name="major_id" class="select select-bordered w-full" required>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}"
                                        {{ $classroom->major_id == $major->id ? 'selected' : '' }}>
                                        {{ $major->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Wali Kelas (Guru)</span>
                            </label>
                            <select name="teacher_id" class="select select-bordered w-full" required>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ $classroom->teacher_id == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end gap-4 mt-6">
                            <a href="{{ route('admin.classrooms.index') }}" class="btn btn-ghost">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
