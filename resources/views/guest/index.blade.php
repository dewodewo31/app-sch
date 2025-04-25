@extends('guest.welcome')

@section('content')
    <!-- Hero Section -->
    <section class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-4xl">
                <h1 class="text-5xl font-bold mb-6">Sekolah Karya Nusantara</h1>
                <p class="text-2xl mb-8">Mendidik Generasi Unggul dengan Integritas dan Kreativitas</p>
                <button class="btn btn-primary btn-lg">Lihat Program Kami</button>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-4xl font-bold mb-6">Visi Kami</h2>
                    <p class="text-xl">Menjadi Lembaga Pendidikan Terdepan dalam Membentuk Karakter dan Prestasi Siswa</p>
                </div>
                <div>
                    <h2 class="text-4xl font-bold mb-6">Misi Kami</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Menyediakan pendidikan holistik berbasis karakter
                        </li>
                        <!-- Tambahkan item misi lainnya -->
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Fasilitas -->
    <section class="py-20 bg-base-200">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Fasilitas Unggulan</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="card bg-base-100 shadow-xl">
                    <figure class="px-4 pt-4">
                        <img src="lab-komputer.jpg" alt="Lab Komputer" class="rounded-xl h-48 w-full object-cover">
                    </figure>
                    <div class="card-body items-center text-center">
                        <h3 class="card-title">Lab Komputer Modern</h3>
                        <p>Dilengkapi dengan perangkat terkini untuk pembelajaran digital</p>
                    </div>
                </div>
                <!-- Tambahkan fasilitas lainnya -->
            </div>
        </div>
    </section>

    <!-- Prestasi -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Prestasi Kami</h2>
            <div class="stats shadow w-full">
                <div class="stat">
                    <div class="stat-title">Total Siswa</div>
                    <div class="stat-value text-primary">1.200+</div>
                    <div class="stat-desc">2010-2023</div>
                </div>
                <!-- Tambahkan statistik lainnya -->
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="py-20 bg-base-200">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4">Hubungi Kami</h2>
                <p class="text-xl">Kami siap menjawab semua pertanyaan Anda</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <form class="space-y-4">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Nama Lengkap</span>
                                </label>
                                <input type="text" placeholder="Nama Anda" class="input input-bordered">
                            </div>
                            <!-- Tambahkan field form lainnya -->
                            <button class="btn btn-primary">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="avatar">
                            <div class="w-12 rounded-full bg-primary text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold">Alamat Sekolah</p>
                            <p>Jl. Pendidikan No. 123, Jakarta Pusat</p>
                        </div>
                    </div>
                    <!-- Tambahkan kontak lainnya -->
                </div>
            </div>
        </div>
    </section>
@endsection
