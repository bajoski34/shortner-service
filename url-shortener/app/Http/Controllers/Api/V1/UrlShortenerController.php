<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\CreateShortsRequest;
use App\Models\ShortenedUrl;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    public function store(CreateShortsRequest $request)
    {
        $shortCode = Str::random(6);
        
        // ShortenedUrl::create([
        //     'short_code' => $shortCode,
        //     'long_url' => $request->url,
        //     'expires_at' => now()->addSeconds($request->expires ?? 3600),
        // ]);

        Cache::put($shortCode, $request->url, now()->addDays(30));

        return response()->json([
            'short_url' => url($shortCode),
            'long_url' => $request->url,
        ]);
    }

    public function encode(CreateShortsRequest $request)
    {   
        $shortCode = Str::random(6);

        Cache::put($shortCode, $request->url, now()->addDays(30));

        return response()->json([
            'short_url' => url("/$shortCode"),
            'original_url' => $request->url,
        ]);
    }

    public function decode(Request $request)
    {
        $request->validate(['short_code' => 'required|string']);
        
        $originalUrl = Cache::get($request->short_code);

        if (!$originalUrl) {
            return response()->json(['error' => 'URL not found'], 404);
        }

        return response()->json(['original_url' => $originalUrl]);
    } 
}
