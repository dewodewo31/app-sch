@extends('admin.layouts.app')

@section('content')
    <div class="p-6">
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow">
                <div class="card-body space-y-6">
                    <h2 class="card-title">Tambah Mata Pelajaran Baru</h2>

                    <form action="{{ route('admin.subjects.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="label">
                                <span class="label-text">Nama Mata Pelajaran</span>
                            </label>
                            <input type="text" name="name" placeholder="Masukkan nama mata pelajaran"
                                class="input input-bordered w-full @error('name') input-error @enderror"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.subjects.index') }}" class="btn btn-ghost">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
