<?php

namespace App\Http\Controllers;

use App\Glossary;
use Illuminate\Http\Request;

class GlossaryController extends Controller
{
    // получаем из базы данных полный URL по скоращенному
    public function index($url_short) {
        $url_full =  Glossary::where('url_short', $url_short)->select('url_full')->first()['url_full'];
        return redirect($url_full);
    }
}
