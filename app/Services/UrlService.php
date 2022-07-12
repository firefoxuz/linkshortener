<?php

namespace App\Services;

use App\Models\Url;

class UrlService
{
    public function encode(Url $url): string
    {
        return strtr(rtrim(base64_encode(pack('i', $url->created_at->unix() + $url->id)), '='), '+/', '-_');
    }

    public function decode(string $base64): string
    {
        $number = unpack('i', base64_decode(str_pad(strtr($base64, '-_', '+/'), strlen($base64) % 4, '=')));
        return $number[1];
    }
}
