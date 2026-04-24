<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/chat.php';
Route::get('/online-status', [StatusController::class, 'index'])->name('status.index');
Route::patch('/online-status/{contact}', [StatusController::class, 'update'])->name('status.contacts.update');
