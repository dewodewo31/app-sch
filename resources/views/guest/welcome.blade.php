<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing - Sekolah Karya Nusantara</title>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased bg-base-100 text-base-content">

    <div class="navbar bg-base-200 px-6">
        <div class="flex-1">
            <a href="/" class="text-xl font-bold">Karya Nusantara</a>
        </div>
        <div class="flex-none">
            <a href="{{ route('admin.login') }}" class="btn btn-primary">Login Admin</a>
        </div>
    </div>

    <main class="p-6">
        {{-- YIELD INI WAJIB SESUAI NAMA SECTION DI INDEX --}}
        @yield('content')
    </main>

    <footer class="footer p-10 bg-gradient-to-r from-base-200 to-base-300 text-base-content mt-16 shadow-xl">
        <div class="container mx-auto max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand Section -->
                <aside class="space-y-4 animate-fade-in-up">
                    <div class="flex items-center gap-2">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                            <span class="text-2xl font-bold text-white">SKN</span>
                        </div>
                        <h2 class="text-xl font-bold">Sekolah Karya Nusantara</h2>
                    </div>
                    <p class="text-sm opacity-90">Belajar adalah petualangan menuju masa depan yang gemilang</p>
                    <div class="flex gap-4 mt-4">
                        <a class="btn btn-circle btn-sm btn-primary hover:-translate-y-1 transition-transform">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-circle btn-sm btn-info hover:-translate-y-1 transition-transform">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-circle btn-sm btn-error hover:-translate-y-1 transition-transform">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </aside>

                <!-- Navigation -->
                <nav class="animate-fade-in-up delay-100">
                    <h6 class="footer-title text-lg">Navigasi</h6>
                    <div class="space-y-3">
                        <a class="link link-hover hover:text-primary transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            Tentang Kami
                        </a>
                        <a class="link link-hover hover:text-primary transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            Program Belajar
                        </a>
                        <a class="link link-hover hover:text-primary transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            Galeri Kegiatan
                        </a>
                        <a class="link link-hover hover:text-primary transition-colors flex items-center gap-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            Testimoni
                        </a>
                    </div>
                </nav>

                <!-- Contact Info -->
                <nav class="animate-fade-in-up delay-200">
                    <h6 class="footer-title text-lg">Kontak</h6>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                            <p>Jl. Pendidikan No. 123<br>Jakarta Selatan, Indonesia</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-phone text-primary"></i>
                            <p>+62 21 1234 5678</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-envelope text-primary"></i>
                            <p>info@sekolahkarya.id</p>
                        </div>
                    </div>
                </nav>

                <!-- Newsletter -->
                <div class="animate-fade-in-up delay-300">
                    <h6 class="footer-title text-lg">Newsletter</h6>
                    <form class="space-y-4">
                        <div>
                            <label class="label">
                                <span class="label-text">Dapatkan update terbaru</span>
                            </label>
                            <input type="email" placeholder="Email Anda" class="input input-bordered w-full" />
                        </div>
                        <button class="btn btn-primary w-full hover:scale-105 transition-transform">
                            Subscribe <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-base-300 mt-12 pt-6 text-center animate-fade-in-up delay-500">
                <p>© 2024 Sekolah Karya Nusantara. Seluruh hak cipta dilindungi</p>
            </div>
        </div>
    </footer>

</body>

</html>
