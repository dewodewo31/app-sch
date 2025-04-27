@extends('admin.layouts.app')

@section('title', 'Buat Enrollment Baru')

@section('content')
    <div class="p-4">
        <div class="max-w-2xl mx-auto bg-base-100 rounded-box shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Tambah Enrollment</h2>

            <form action="{{ route('admin.enrollments.store') }}" method="POST">
                @csrf

                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text">Siswa</span>
                    </label>
                    <select name="student_id" class="select select-bordered w-full">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control mb-4">
                    <label class="label">
                        <span class="label-text">Kelas</span>
                    </label>
                    <select name="classroom_id" class="select select-bordered w-full">
                        @foreach ($classrooms->groupBy('major.name') as $major => $classroomsInMajor)
                            <optgroup label="{{ $major }}">
                                @foreach ($classroomsInMajor as $classroom)
                                    <option value="{{ $classroom->id }}">
                                        {{ $classroom->grade_level }} - {{ $classroom->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.enrollments.index') }}" class="btn btn-ghost">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
