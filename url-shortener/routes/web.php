<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;

Route::get('/{id}', [UrlShortenerController::class, 'redirect']);