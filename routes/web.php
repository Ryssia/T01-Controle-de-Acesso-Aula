<?php

use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;
use App\Models\Noticia;

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

Route::resource('/noticias', NoticiaController::class);


//-------------------------------------------

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

Route::get('/auth/redirect/{provider}', function ($provider) {

    return Socialite::driver($provider)->redirect();
    })->name('social.login');


Route::get('/auth/callback/{provider}', function ($provider) {
    
    $providerUser = Socialite::driver($provider)->user();
    //dd($providerUser);
    $user = User::firstOrCreate([
    "email" => $providerUser->email
    ],[
    "name" => $providerUser->name,
    "provider" => $provider,
    "provider_id" => $providerUser->getId(),
    "admin" => 0
    ]);
    //dd($user);
    Auth::login($user);
    return redirect('/dashboard');
    
    })->name('social.callback');


require __DIR__.'/auth.php';