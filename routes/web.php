<?php

use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Two;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('test');
});

Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {

    $user = Socialite::driver('github')->user();
    $scope = Socialite::driver('github')->setScopes(['read:user', 'public_repo', 'contents:read'])->redirect();
    // $token = $user->token;
    dd($user);
    // $response = Http::withToken($token)->get('https://api.github.com/user/repos');
    // $response = Http::get('https://api.github.com/repos/ayooke97/phpadv_eval/contents/index.php');
    // dd($response->json());
    // dd($response->status());

    // $res = $response->json();
    // dd(base64_decode($res['content']));
});
