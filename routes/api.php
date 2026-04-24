<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| NHOMJ — API Routes: Reaction & Comment
| Middleware: auth:sanctum (yêu cầu đăng nhập)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // ── REACTION ──────────────────────────────────────────
    Route::get ('bai-viet/{baiViet}/reactions',   [ReactionController::class, 'danhSach']);

    // ── BÌNH LUẬN ─────────────────────────────────────────
    Route::get   ('bai-viet/{baiViet}/binh-luan',  [CommentController::class, 'index']);
    Route::put   ('binh-luan/{binhLuan}',           [CommentController::class, 'update']);
    Route::delete('binh-luan/{binhLuan}',           [CommentController::class, 'destroy']);
    Route::get   ('binh-luan/{binhLuan}/tra-loi',   [CommentController::class, 'traLoi']);
});

// Tạm bỏ auth để test reaction & bình luận trực tiếp trên homepage
Route::post('bai-viet/{baiViet}/binh-luan',        [CommentController::class, 'store']);
Route::post('bai-viet/{baiViet}/reaction',         [ReactionController::class, 'toggleBaiViet']);
Route::post('binh-luan/{binhLuan}/reaction',       [ReactionController::class, 'toggleBinhLuan']);