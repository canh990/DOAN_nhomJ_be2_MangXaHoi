<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Schema;

class MessageController extends Controller
{
    public function getMessages($id)
    {
        if (! Schema::hasTable('messages') || ! Schema::hasColumn('messages', 'conversation_id')) {
            return response()->json([]);
        }

        return Message::where('conversation_id', $id)->get();
    }
}
