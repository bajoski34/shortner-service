<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortenedUrl;

class UrlShortenerController extends Controller
{
    public function redirect($shortCode)
    {
        $shortUrl = ShortenedUrl::where('short_code', $shortCode)->firstOrFail();

        return redirect()->to($shortUrl->long_url, 301);
    }
}
