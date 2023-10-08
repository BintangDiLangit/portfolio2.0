<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public function all(Request $request)
    {
        $env = env('APP_URL_API');
        $response = Http::post(env('APP_URL_API') . '/api/v1/seo');
        $dataSeo = $response->json()["data"][0];
        return view('articles.articles', compact('dataSeo'));
    }
}
