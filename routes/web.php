<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat1-1', [ChatController::class, 'index'])->name('chat.demo');
Route::post('/chat1-1/conversations', [ChatController::class, 'storeConversation'])->name('chat.conversations.store');
Route::post('/chat1-1/conversations/{conversation}/messages', [ChatController::class, 'storeMessage'])->name('chat.messages.store');
