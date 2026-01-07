<?php

use App\Livewire\About;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', About::class)->name('about');