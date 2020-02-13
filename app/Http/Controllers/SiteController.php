<?php

namespace App\Http\Controllers;

use App\Glossary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SiteController extends Controller
{
    // получаем из базы данных полный URL по скоращенному и делаем редирект с кодом 308
    public function index($url_short)
    {
        if($url_full =  Glossary::getFullUrl($url_short)) {
            return redirect($url_full, 308);
        }
        return abort(404);
    }
    // отображаем справочную страницу
    public function help() {
        return view('help', ['domain' => Config::get('myconfig.domain')]);
    }
}
