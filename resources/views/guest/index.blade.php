@extends('guest.welcome')

@section('content')
    <section class="text-center py-20">
        <h1 class="text-4xl font-bold mb-4">Selamat Datang di Portal Admin Sekolah Karya Nusantara</h1>
        <p class="text-lg mb-8">Platform digital manajemen sekolah terbaik untuk siswa, guru, dan administrator.</p>
        <a href="{{ route('admin.login') }}" class="btn btn-primary btn-lg">Login Admin</a>
    </section>

    <section class="grid md:grid-cols-3 gap-6 my-12">
        <div class="card bg-base-100 shadow">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Manajemen Siswa</h2>
                <p>Data lengkap siswa dari profil, absensi, hingga nilai akademik.</p>
            </div>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Jadwal Pelajaran</h2>
                <p>Atur jadwal kelas dan pelajaran dengan mudah dan efisien.</p>
            </div>
        </div>
        <div class="card bg-base-100 shadow">
            <div class="card-body items-center text-center">
                <h2 class="card-title">Manajemen Guru</h2>
                <p>Kelola data guru, jadwal mengajar, dan laporan akademik.</p>
            </div>
        </div>
    </section>
@endsection
