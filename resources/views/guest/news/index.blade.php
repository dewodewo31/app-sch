@extends('guest.welcome')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-3xl font-bold text-center mb-6">Berita Pendidikan Indonesia</h1>

        @if (count($articles) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($articles as $article)
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="{{ $article['url'] }}" target="_blank" class="text-blue-500 hover:underline">
                                    {{ $article['title'] }}
                                </a>
                            </h2>
                            <p class="text-gray-700">{{ $article['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">Tidak ada berita ditemukan.</p>
        @endif
    </div>
@endsection
