<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortenedUrl extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'short_code',
        'long_url',
        'expires_at',
    ];
}
