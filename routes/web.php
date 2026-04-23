<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');
Route::get('/register', [CrudUserController::class, 'showRegister'])->name('register');
Route::post('/register', [CrudUserController::class, 'register']);
Route::get('/logout', [CrudUserController::class, 'ssignout'])->name('signout');
Route::get('dashboard', [CrudUserController::class, 'dashboard'])->name('dashboard');
Route::get('/user/create', [CrudUserController::class, 'createUser'])->name('user.createUser');

Route::prefix('users')->name('user.')->group(function () {
    Route::get('/', [CrudUserController::class, 'listUser'])->name('list');
    Route::get('/{user}', [CrudUserController::class, 'readUser'])->name('readUser');
    Route::get('/{user}/edit', [CrudUserController::class, 'editUser'])->name('updateUser');
    Route::put('/{user}', [CrudUserController::class, 'saveUser'])->name('saveUser');
    Route::delete('/{user}', [CrudUserController::class, 'deleteUser'])->name('deleteUser');
});
