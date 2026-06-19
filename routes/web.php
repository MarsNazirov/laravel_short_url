<?php

use App\Http\Controllers\LinkController;
use App\Models\Link;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{code}', [LinkController::class, 'redirect']);

// Route::get('/a', function () {
//     echo 'Счетчик: Готов';
// });

