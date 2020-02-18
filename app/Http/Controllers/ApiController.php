<?php

namespace App\Http\Controllers;

use App\Glossary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApiController extends Controller
{

    public function add(Request $request)
    {
        // принимаем из запроса полный url
        if(!empty($url_full = request('url'))){
            // записываем в БД новую пару url и получаем короткий вариант, второй аргумент - длина короткого url
            return Glossary::addUrl($url_full, Config::get('myconfig.url_length'));
        }
        return '';
    }

    public function get()
    {
        if (request('url')) {
            // принимаем из запроса сокращенный url, отсеиваем название домена
            $url_short = str_replace(Config::get('myconfig.domain'), '', request('url'));

            // получаем из БД полный адрес
            return Glossary::getFullUrl($url_short);
        }
    }
}
