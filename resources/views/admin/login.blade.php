@extends('guest.welcome')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-base-200">
        <div class="w-full max-w-md bg-base-100 p-8 shadow-lg rounded-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Login Admin</h1>

            @if (session('error'))
                <div class="alert alert-error mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('admin.auth') }}">
                @csrf

                <!-- Email Input -->
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text font-medium py-2">Email Admin</span>
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        placeholder="Masukkan email admin"
                        class="input input-bordered w-full @error('email') input-error @enderror"
                        aria-invalid="@error('email') true @else false @enderror"
                        aria-describedby="@error('email') email-error @enderror" required autofocus>
                    @error('email')
                        <label class="label" id="email-error" aria-live="polite">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text font-medium py-2">Password</span>
                    </label>
                    <input id="password" type="password" name="password" placeholder="••••••••"
                        class="input input-bordered w-full @error('password') input-error @enderror"
                        aria-invalid="@error('password') true @else false @enderror"
                        aria-describedby="@error('password') password-error @enderror" required>
                    @error('password')
                        <label class="label" id="password-error" aria-live="polite">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-control mt-8">
                    <button type="submit" class="btn btn-primary w-full">
                        Masuk ke Dashboard
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
