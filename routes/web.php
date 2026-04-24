<?php
require __DIR__ . '/Auth.php';
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Models\BaiViet;

Route::get('/', function () {
    $posts = BaiViet::where('da_xoa', 0)
        ->with(['nguoiDung', 'camXuc', 'binhLuan.nguoiDung', 'binhLuan.camXuc'])
        ->orderByDesc('created_at')
        ->get();

    return view('tin.feed', compact('posts'));
});

Route::get('/feed', function () {
    return redirect('/');
});

require __DIR__.'/chat.php';

Route::get('/online-status', [StatusController::class, 'index'])->name('status.index');
Route::patch('/online-status/{contact}', [StatusController::class, 'update'])->name('status.contacts.update');
    });
