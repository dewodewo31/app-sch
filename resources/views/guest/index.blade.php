@extends('guest.welcome')

@section('content')
    <!-- Hero Section -->
    <section class="hero min-h-screen bg-gradient-to-r from-blue-500 to-indigo-600 text-white flex items-center">
        <div class="container mx-auto text-center px-6">
            <h1 class="text-5xl font-extrabold mb-4 animate-fade-in">Sekolah Karya Nusantara</h1>
            <p class="text-2xl mb-8 animate-fade-in delay-100">Mendidik Generasi Unggul dengan Integritas dan Kreativitas</p>
            <a href="#program" class="btn btn-primary btn-lg animate-bounce">Lihat Program Kami</a>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-20 px-6" id="program">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold">Visi & Misi</h2>
                <p class="text-lg text-gray-600">Komitmen kami dalam dunia pendidikan</p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-semibold mb-4">Visi Kami</h3>
                    <p class="text-lg text-gray-700 leading-relaxed">Menjadi Lembaga Pendidikan Terdepan dalam Membentuk
                        Karakter dan Prestasi Siswa.</p>
                </div>
                <div>
                    <h3 class="text-2xl font-semibold mb-4">Misi Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <span class="text-green-500 mt-1">✔</span>
                            Menyediakan pendidikan holistik berbasis karakter
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-green-500 mt-1">✔</span>
                            Mendorong kreativitas dan inovasi dalam proses belajar
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-green-500 mt-1">✔</span>
                            Menanamkan nilai-nilai integritas dan tanggung jawab
                        </li>
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
                @foreach ([['img' => 'https://img.freepik.com/free-photo/diverse-education-shoot_53876-47033.jpg?ga=GA1.1.175466719.1739645763&semt=ais_hybrid&w=740', 'title' => 'Lab Komputer Modern', 'desc' => 'Dilengkapi perangkat terkini untuk pembelajaran digital'], ['img' => 'https://img.freepik.com/free-photo/crop-hands-using-tablet-library_23-2147845934.jpg?ga=GA1.1.175466719.1739645763&semt=ais_hybrid&w=740', 'title' => 'Perpustakaan Digital', 'desc' => 'Koleksi buku dan jurnal yang lengkap'], ['img' => 'https://img.freepik.com/premium-photo/view-soccer-field-against-cloudy-sky_1048944-2703365.jpg?ga=GA1.1.175466719.1739645763&semt=ais_hybrid&w=740', 'title' => 'Lapangan Olahraga', 'desc' => 'Fasilitas olahraga lengkap untuk pengembangan fisik']] as $facility)
                    <div class="card bg-white shadow-md hover:shadow-xl transition-shadow rounded-xl overflow-hidden">
                        <figure>
                            <img src="{{ $facility['img'] }}" alt="{{ $facility['title'] }}"
                                class="h-48 w-full object-cover">
                        </figure>
                        <div class="card-body p-5 text-center">
                            <h3 class="card-title text-xl font-semibold mb-2">{{ $facility['title'] }}</h3>
                            <p class="text-gray-600">{{ $facility['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Prestasi -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold">Prestasi Kami</h2>
                <p class="text-lg text-gray-600">Pencapaian yang membanggakan</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6 text-center">
                <div class="stat bg-base-100 shadow p-6 rounded-xl">
                    <div class="stat-title">Total Siswa</div>
                    <div class="stat-value text-primary text-3xl">1.200+</div>
                    <div class="stat-desc">2010 - 2023</div>
                </div>
                <div class="stat bg-base-100 shadow p-6 rounded-xl">
                    <div class="stat-title">Lulusan Berprestasi</div>
                    <div class="stat-value text-green-600 text-3xl">500+</div>
                    <div class="stat-desc">Mewakili tingkat nasional</div>
                </div>
                <div class="stat bg-base-100 shadow p-6 rounded-xl">
                    <div class="stat-title">Penghargaan Sekolah</div>
                    <div class="stat-value text-yellow-500 text-3xl">30+</div>
                    <div class="stat-desc">Dalam bidang akademik & seni</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section class="py-20 bg-base-200" id="kontak">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold">Hubungi Kami</h2>
                <p class="text-lg text-gray-600">Kami siap menjawab semua pertanyaan Anda</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="card bg-white shadow-md p-6">
                    <form class="space-y-4">
                        <div>
                            <label class="block mb-1 font-semibold">Nama Lengkap</label>
                            <input type="text" class="input input-bordered w-full" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Email</label>
                            <input type="email" class="input input-bordered w-full" placeholder="Email Anda">
                        </div>
                        <div>
                            <label class="block mb-1 font-semibold">Pesan</label>
                            <textarea class="textarea textarea-bordered w-full" rows="4" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <button class="btn btn-primary w-full">Kirim Pesan</button>
                    </form>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-primary text-white w-12 h-12 rounded-full flex items-center justify-center">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">Alamat Sekolah</p>
                            <p>Jl. Pendidikan No. 123, Jakarta Pusat</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="bg-primary text-white w-12 h-12 rounded-full flex items-center justify-center">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0v1a2 2 0 01-2 2h-4a2 2 0 01-2-2v-1m8 0H8" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">Email</p>
                            <p>info@karyanusantara.sch.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
