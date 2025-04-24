<header class="navbar bg-base-100 shadow-lg sticky top-0 z-50">
    <!-- Logo & Brand -->
    <div class="navbar-start">
        <a href="{{ route('admin.index') }}" class="btn btn-ghost normal-case text-xl gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            MyAdmin
        </a>
    </div>

    <!-- Desktop Navigation -->
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1 gap-2">
            <li>
                <a href="{{ route('admin.index') }}" class="hover:text-primary [&.active]:underline">
                    Dashboard
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('admin.users') }}" class="hover:text-primary [&.active]:underline">
                    Users
                </a>
            </li> --}}
            <li>
                <details>
                    <summary class="hover:text-primary">Settings</summary>
                    <ul class="p-2 bg-base-100 shadow-lg rounded-box">
                        <li><a>General</a></li>
                        <li><a>Permissions</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>

    <!-- Right Section -->
    <div class="navbar-end gap-4">
        <!-- Theme Toggle -->
        <label class="swap swap-rotate">
            <input type="checkbox" class="theme-controller" value="dark" />
            <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM20.3,7.34a1,1,0,0,0-1.41,0l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,20.3,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Z" />
            </svg>
            <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
            </svg>
        </label>

        <!-- User Menu -->
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full bg-primary text-white flex items-center justify-center">
                    @auth('admin')
                        @php
                            // Ambil nama user dari guard admin
                            $user = Auth::guard('admin')->user();
                            $nameParts = explode(' ', $user->name);
                            $initials = '';

                            // Ambil inisial dari kata pertama
                            if (count($nameParts) > 0) {
                                $initials .= strtoupper(substr($nameParts[0], 0, 1));
                            }

                            // Ambil inisial dari kata kedua (jika ada)
                            if (count($nameParts) > 1) {
                                $initials .= strtoupper(substr($nameParts[1], 0, 1));
                            }

                            // Fallback jika tidak ada nama
                            $initials = $initials ?: '?';
                        @endphp
                        <span class="text-lg">{{ $initials }}</span>
                    @else
                        <span class="text-lg">?</span>
                    @endauth
                </div>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a class="hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="hover:text-primary w-full text-left flex items-center gap-2 px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>

    <!-- Mobile Menu Toggle -->
    <div class="navbar-end lg:hidden">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-5 h-5 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>
</header>
