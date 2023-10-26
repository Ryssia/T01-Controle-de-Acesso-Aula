<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Noticia;
use App\Http\Controllers\Api\NoticiaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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

Route::middleware('auth:sanctum')->group(function () {


    Route::apiResource('noticias', NoticiaController::class);

    Route::patch('/noticias/{noticia}', function(Request $request, Noticia $noticia){
        $noticia->titulo = $request->titulo;
        $noticia->save();

        return response()->json($noticia,200);
    });

});

Route::post('/login', function(Request $request){
    $credenciais = $request->only(['name', 'email', 'password']);

    if(Auth::attempt($credenciais) === false){
        return response()->json('credenciais invalidas', 401);
    }

    $user = Auth::user();
    $user->tokens()->delete();
    $token = $user->createToken('token');
    return response()->json(['token' => $token->plainTextToken]);
});
