<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{
    ShowTweets,
    User\UploadPhoto
};

Route::middleware(['auth'])->group(function () {
    Route::get('tweets', ShowTweets::class)->name('tweets');
    Route::get('upload-photo', UploadPhoto::class)->name('upload.photo');
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
