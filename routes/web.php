<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * @subpackage classes
 */

// Route::get('/', function () {
//     return view('welcome');
// });

// регистрируем роут для страницы описания API
Route::get('/api/help/', 'GlossaryController@help');

// регистрируем роут для переадресации пользователей
Route::get('/{url_short}', 'GlossaryController@index');