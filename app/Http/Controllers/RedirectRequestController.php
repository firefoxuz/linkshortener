<?php

namespace App\Http\Controllers;

use App\Models\Url;

class RedirectRequestController extends Controller
{
    public function __invoke($short_url)
    {
        $url = Url::where('short_url', $short_url)->first();

        abort_if(!$url,404);

        $url->increment('views');
        return  redirect($url->long_url);
    }
}
