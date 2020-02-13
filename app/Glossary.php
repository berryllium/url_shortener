<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class Glossary extends Model
{
    protected $fillable = ['url_short', 'url_full'];
    
    // добавляем в БД запись с оригинальным и коротким URL
    static function addUrl($url_full, $length)
    {
        // генерируем короткую комбинацию, пока не найдем уникальную (которой еще нет в БД)
        do {
            $url_short = static::generateUrl($url_full, $length);
        } while (static::where('url_short', $url_short)->first());
        // вставляем запись в БД
        static::insert(
            ['url_full' => $url_full, 'url_short' => $url_short]
        );
        // возвращаем короткий URL
        return Config::get('myconfig.domain') . $url_short;
    }
    // метод для генерации URL
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
    // получаем полный URL по сокращенному
    static function getFullUrl($url_short)
    {
        $url_short = str_replace(Config::get('myconfig.domain'), '', $url_short);
        return static::where('url_short', $url_short)->select('url_full')->first()['url_full'];
    }

    static function getManyUrl($count = 0)
    {
        // если установлено число записей, получаем указанное количество, иначе получаем всю коллекцию
        if ($count) {
            $collection = static::select('url_full', 'url_short')->limit($count)->get();
        } else {
            $collection = static::select('url_full', 'url_short')->get();
        }
        // восстанавливаем короткие ссылки из имени домена и уникальной комбинации из БД
        foreach ($collection as $url) {
            $url['url_short'] = Config::get('myconfig.domain') . $url['url_short'];
        }
        return $collection;
    }
}
