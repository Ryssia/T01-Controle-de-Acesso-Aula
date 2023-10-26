<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Noticia;
use App\Http\Controllers\Api\NoticiaController;

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

Route::apiResource('noticias', NoticiaController::class);

Route::patch('/noticias/{noticia}', function(Request $request, Noticia $noticia){
    $noticia->titulo = $request->titulo;
    $noticia->save();
    
    return response()->json($noticia,200);
});
