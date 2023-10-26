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

Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
})->name('github.login');

Route::get('/auth/callback', function () {

    $userGithub = Socialite::driver('github')->user();

    $user = User::firstOrCreate([
        "email" => $userGithub->email
        ],[
        "name" => $userGithub->name,
        "admin" => 0
        ]);
        Auth::login($user);

        return redirect('/dashboard');

})->name('github.callback');


require __DIR__.'/auth.php';