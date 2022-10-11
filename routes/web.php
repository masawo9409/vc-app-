<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/route/hello', function () {
    return '<h1>Hello from Route!</h1>';
});

Route::get('/view/hello', function () {
    return view('message.hello');
});
//'message.varというルーティングした.
Route::get('/view/var', function () {
    return view('message.var', ['variable' => 'Hello from web.php']);
});

Route::get('/view/word/{msg}', function($msg) {
    return view('message.word', ['msg' => $msg]);
});

Route::get('/view/word/{name}/{msg}', function($name, $msg) {
    return view('message.word2', [
        'name' => $name, 
        'msg' => $msg
    ]);
});

Route::get('/controller/hello', [App\Http\Controllers\MessageController::class, 'hello']);
Route::get('/controller/var', [App\Http\Controllers\MessageController::class, 'var']);

// controller/word/{msg}のパスを定義。
Route::get('/controller/word/{msg}', [App\Http\Controllers\MessageController::class, 'word']);
Route::get('/controller/word/{name}/{msg}', [App\Http\Controllers\MessageController::class, 'word2']);
Route::get('/controller/result',[App\Http\Controllers\MessageController::class, 'word'])
