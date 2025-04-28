<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $apiKey = env('NEWS_API_KEY'); // Ambil API Key dari .env

        $response = Http::get('https://newsapi.org/v2/everything', [
            'q' => 'pendidikan Indonesia',
            'language' => 'id', // Bahasa Indonesia
            'sortBy' => 'publishedAt',
            'apiKey' => $apiKey,
        ]);

        // Ambil hasil response
        $articles = $response->json()['articles'] ?? [];

        // Kirim data ke view
        return view('guest.news.index', compact('articles'));
    }
}
