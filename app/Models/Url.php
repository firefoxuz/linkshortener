<?php

namespace App\Models;

use App\Services\UrlService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'long_url',
        'short_url',
        'views',
    ];

    public function getShortUrlAttribute($attribute)
    {
        return url($attribute);
    }

    protected static function booted()
    {
        static::created(function ($url) {
            $urlService = new UrlService();
            $url->short_url = $urlService->encode($url);
            $url->save();
        });
    }
}
