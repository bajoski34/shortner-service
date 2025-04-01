<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UrlShortenerController;

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {

    Route::get('/', function () {
        return response()->json(['message' => 'Hello from proper short link service']);
    });

    Route::post('/shorts', [UrlShortenerController::class, 'store']);

    Route::post('/encode', [UrlShortenerController::class, 'encode']);

    Route::post('/decode', [UrlShortenerController::class, 'decode']);
});

