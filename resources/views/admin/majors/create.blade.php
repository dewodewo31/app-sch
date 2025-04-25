@extends('admin.layouts.app')

@section('title')
    Buat Kelas
@endsection

@section('content')
    <div class="p-4">
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <h2 class="card-title">Tambah Jurusan Baru</h2>

                    <form action="{{ route('admin.majors.store') }}" method="POST">
                        @csrf

                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Nama Jurusan</span>
                            </label>
                            <input type="text" name="name" class="input input-bordered w-full"
                                placeholder="Contoh: RPL (Rekayasa Perangkat Lunak)" required>
                        </div>

                        <div class="flex justify-end gap-4 mt-6">
                            <a href="{{ route('admin.majors.index') }}" class="btn btn-ghost">
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
