<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\PostController;
use App\Models\BaiViet;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('bangtin')->group(function () {
    Route::get('/', function () {
        $posts = BaiViet::with('media')->latest()->get();
        return view('welcome', compact('posts'));
    })->name('home');

    Route::post('/post', [PostController::class, 'store'])->name('post.store');
});

Route::get('dashboard', ['App\Http\Controllers\CrudUserController', 'dashboard']);
Route::get('login', ['App\Http\Controllers\CrudUserController', 'login'])->name('login');
Route::post('login', ['App\Http\Controllers\CrudUserController', 'authUser'])->name('user.authUser');

Route::get('create', ['App\Http\Controllers\CrudUserController', 'createUser'])->name('user.createUser');
Route::post('create', ['App\Http\Controllers\CrudUserController', 'postUser'])->name('user.postUser');

Route::get('read/{user}', ['App\Http\Controllers\CrudUserController', 'readUser'])->name('user.readUser');
Route::get('edit/{user}', ['App\Http\Controllers\CrudUserController', 'editUser'])->name('user.editUser');
Route::get('update/{user}', ['App\Http\Controllers\CrudUserController', 'updateUser'])->name('user.updateUser');
Route::post('update/{user}', ['App\Http\Controllers\CrudUserController', 'postUpdateUser'])->name('user.postUpdateUser');

Route::delete('delete/{user}', ['App\Http\Controllers\CrudUserController', 'deleteUser'])->name('user.deleteUser');
Route::get('delete/{user}', ['App\Http\Controllers\CrudUserController', 'deleteUser'])->name('user.delete');

Route::get('list', ['App\Http\Controllers\CrudUserController', 'listUser'])->name('user.list');
Route::get('signout', ['App\Http\Controllers\CrudUserController', 'signOut'])->name('signout');

Route::get('/', function () {
    return redirect()->route('home');
});
