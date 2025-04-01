<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'expires' => 'nullable|integer',
        ]);

        $shortCode = Str::random(6);
        
        ShortenedUrl::create([
            'short_code' => $shortCode,
            'long_url' => $request->url,
            'expires_at' => now()->addSeconds($request->expires ?? 3600),
        ]);

        return response()->json([
            'short_url' => url($shortCode),
            'long_url' => $request->url,
        ]);
    }

    public function redirect($shortCode)
    {
        $shortUrl = ShortenedUrl::where('short_code', $shortCode)->firstOrFail();

        return redirect()->to($shortUrl->long_url, 301);
    }
}
