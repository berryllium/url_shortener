<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class Glossary extends Model
{
    protected $fillable = ['url_short', 'url_full'];

    static function addUrl($url_full, $length)
    {
        return static::where('url_short', 'DWdK')->first();
        do {
            $url_short = static::generateUrl($url_full, $length);
        } 
        while (!static::where('url_short', $url_short)->first());

        static::insert(
            ['url_full' => $url_full, 'url_short' => $url_short]
        );
        return Config::get('myconfig.domain') . $url_short;
    }

    static function generateUrl($url_full, $length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
