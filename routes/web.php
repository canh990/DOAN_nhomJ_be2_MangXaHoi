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

Route::get('dashboard', [CrudUserController::class, 'dashboard']);
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read/{user}', [CrudUserController::class, 'readUser'])->name('user.readUser');
Route::get('edit/{user}', [CrudUserController::class, 'editUser'])->name('user.editUser');
Route::get('update/{user}', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update/{user}', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::delete('delete/{user}', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');
Route::get('delete/{user}', [CrudUserController::class, 'deleteUser'])->name('user.delete');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');
Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return redirect()->route('home');
});