<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortenedUrl;
use Illuminate\Support\Facades\Cache;

class UrlShortenerController extends Controller
{
    public function redirect($shortCode)
    {
        $shortUrl = Cache::get($shortCode, null);

        if(!$shortUrl) {
            return "<h3>This URL is no longer valid</h3>";
        }

        return redirect()->to($shortUrl, 301);
    }
}
