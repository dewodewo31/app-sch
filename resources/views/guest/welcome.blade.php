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
            <a href="#" class="btn btn-primary">Login Admin</a>
        </div>
    </div>

    <main class="p-6">
        {{-- YIELD INI WAJIB SESUAI NAMA SECTION DI INDEX --}}
        @yield('content')
    </main>

    <footer class="footer p-10 bg-base-200 text-base-content mt-16">
        <aside>
            <p><strong>Sekolah Karya Nusantara</strong><br>Belajar adalah petualangan</p>
        </aside>
        <nav>
            <h6 class="footer-title">Navigasi</h6>
            <a class="link link-hover">Tentang</a>
            <a class="link link-hover">Fitur</a>
            <a class="link link-hover">Kontak</a>
        </nav>
    </footer>

</body>

</html>
