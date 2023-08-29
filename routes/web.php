<?php

use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PapeisController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::resource('/noticias', NoticiaController::class)->middleware(['auth']);
Route::resource('/noticias', NoticiaController::class);

Route::get('/papeis', 'App\Http\Controllers\PapeisController@index')->name('papeis.index');
Route::get('/papeis/create', 'App\Http\Controllers\PapeisController@create')->name('papeis.create');
Route::post('/papeis', 'App\Http\Controllers\PapeisController@store')->name('papeis.store');
Route::get('/papeis/{role}/edit', 'App\Http\Controllers\PapeisController@edit')->name('papeis.edit');
Route::put('/papeis/{role}', 'App\Http\Controllers\PapeisController@update')->name('papeis.update');
Route::delete('/papeis/{role}', 'App\Http\Controllers\PapeisController@destroy')->name('papeis.destroy');

Route::get('/permissoes/{role}', 'App\Http\Controllers\PermissoesController@index')->name('permissoes.index');
Route::post('/permissoes', 'App\Http\Controllers\PermissoesController@store')->name('permissoes.store');

Route::get('/usuarios', function(){
    return view('viewsControleAcesso.usuarios');
})->name('usuarios.index');

require __DIR__.'/auth.php';