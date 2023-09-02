<?php

use App\Http\Controllers\Api\NoticiaController;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/noticias', 'App\Http\Controllers\Api\NoticiaController@index');
Route::apiResource('noticias', NoticiaController::class);

/*
Route::get('/noticias', function(){
    return response()->json(Noticia::all());
});
*/
