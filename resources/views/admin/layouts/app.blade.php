<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    @vite('resources/css/app.css') <!-- Pastikan Tailwind dan DaisyUI sudah diintegrasikan dengan Vite -->
</head>

<body class="bg-base-200">

    <!-- Header -->
    <header class="bg-base-100 shadow-lg">
        <div class="navbar">
            <div class="navbar-start">
                <a href="{{ route('admin.index') }}" class="btn btn-ghost normal-case text-xl">KaryaNusantara</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1 gap-2">
                    <!-- Menu Dashboard -->
                    <li>
                        <a href="{{ route('admin.index') }}"
                            class="text-sm font-medium hover:bg-base-200 hover:text-primary [&.active]:bg-primary [&.active]:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <!-- Menu User -->
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="text-sm font-medium hover:bg-base-200 hover:text-primary [&.active]:bg-primary [&.active]:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            User
                        </a>
                    </li>

                    <!-- Dropdown Human Resource -->
                    <li>
                        <details>
                            <summary
                                class="text-sm font-medium hover:bg-base-200 hover:text-primary [&.active]:bg-primary [&.active]:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Human Resource
                            </summary>
                            <ul class="p-2 bg-base-100 shadow-lg rounded-box z-50">
                                <!-- Submenu Guru -->
                                <li>
                                    <a href="{{ route('admin.teachers.index') }}"
                                        class="text-sm hover:bg-base-200 hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Guru
                                    </a>
                                </li>

                                <!-- Submenu Murid -->
                                <li>
                                    <a href="{{ route('admin.students.index') }}"
                                        class="text-sm hover:bg-base-200 hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        Murid
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    {{-- akademik dropdown --}}
                    <li>
                        <details>
                            <summary
                                class="text-sm font-medium hover:bg-base-200 hover:text-primary [&.active]:bg-primary [&.active]:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Akademik Sekolah
                            </summary>
                            <ul class="p-2 bg-base-100 shadow-lg rounded-box z-50">
                                <li>
                                    <a href="{{ route('admin.classrooms.index') }}"
                                        class="text-sm hover:bg-base-200 hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Kelas
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.majors.index') }}"
                                        class="text-sm hover:bg-base-200 hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Jurusan
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
            <div class="navbar-end">
                @auth('admin')
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-ghost">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest('admin')
                    <a href="{{ route('admin.login') }}" class="btn btn-ghost">
                        Login
                    </a>
                @endguest
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="p-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-base-100 shadow-lg p-4">
        <div class="text-center">
            <p>&copy; 2025 KaryaNusantara. All Rights Reserved.</p>
        </div>
    </footer>

    @stack('scripts') <!-- Stack untuk JavaScript tambahan, jika ada -->
</body>

</html>
