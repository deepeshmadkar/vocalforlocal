<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified',  'zverify'])->get('/dashboard', function () {
    return redirect()->route(auth()->user()->role->routes());
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/verification', function () {

    if(! auth()->user()->isVerified()){
        return view('auth.zverification');
    }
    abort(403);
})->name('verify');
