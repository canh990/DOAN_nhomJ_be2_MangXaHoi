<?php
require __DIR__ . '/Auth.php';
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
