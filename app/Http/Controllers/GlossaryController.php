<?php

namespace App\Http\Controllers;

use App\Glossary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GlossaryController extends Controller
{
    // получаем из базы данных полный URL по скоращенному и делаем редирект с кодом 308
    public function index($url_short)
    {
        if($url_full =  static::getFullUrl($url_short)) {
            return redirect($url_full, 308);
        }
        return abort(404);
    }

    public function getFullUrl($url_short) {
        // получаем из БД полный адрес
        return Glossary::where('url_short', $url_short)->select('url_full')->first()['url_full'];
    }

    public function add(Request $request) {
        // принимаем из запроса полный url
        $url_full = request('url');
        // записываем в БД новую пару url и получаем короткий вариант, второй аргумент - длина короткого url
        return Glossary::addUrl($url_full, Config::get('myconfig.url_length'));
    }

    public function get() {
        // принимаем из запроса сокращенный url, отсеиваем название домена
        $url_short = str_replace(Config::get('myconfig.domain'), '', request('url'));

        // получаем из БД полный адрес
        return static::getFullUrl($url_short);
    }
}
