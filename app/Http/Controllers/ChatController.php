<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ChatController extends Controller
{
    private const SESSION_KEY = 'chat.one_to_one.conversations';

    public function index(Request $request): View
    {
        return view('crud_user.chat1-1', [
            'initialConversations' => $this->getConversations($request),
            'chatRoutes' => [
                'storeConversation' => route('chat.conversations.store'),
                'storeMessage' => route('chat.messages.store', ['conversation' => '__ID__']),
            ],
        ]);
    }

    public function storeConversation(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'avatar' => ['nullable', 'url', 'max:500'],
        ]);

        $conversations = $this->getConversations($request);
        $name = trim($validated['name']);

        $existing = collect($conversations)->first(
            fn (array $conversation) => mb_strtolower($conversation['name']) === mb_strtolower($name)
        );

        if ($existing) {
            return response()->json($existing);
        }

        $conversation = [
            'id' => $this->nextConversationId($conversations),
            'name' => $name,
            'avatar' => $validated['avatar'] ?? $this->buildAvatarUrl($name),
            'lastActive' => 'Vua xong',
            'preview' => 'Hay gui loi chao dau tien...',
            'unread' => 0,
            'messages' => [[
                'id' => now()->timestamp,
                'sender' => 'them',
                'text' => 'Xin chao, minh la '.$name.'.',
                'time' => now()->timezone(config('app.timezone'))->format('H:i'),
            ]],
        ];

        array_unshift($conversations, $conversation);
        $this->storeConversations($request, $conversations);

        return response()->json($conversation, 201);
    }

    public function storeMessage(Request $request, int $conversationId): JsonResponse
    {
        $validated = $request->validate([
            'text' => ['required', 'string', 'max:5000'],
            'sender' => ['nullable', 'in:me,them'],
        ]);

        $conversations = $this->getConversations($request);
        $index = collect($conversations)->search(
            fn (array $conversation) => $conversation['id'] === $conversationId
        );

        if ($index === false) {
            return response()->json(['message' => 'Conversation not found.'], 404);
        }

        $sender = $validated['sender'] ?? 'me';
        $text = trim($validated['text']);

        $message = [
            'id' => now()->valueOf(),
            'sender' => $sender,
            'text' => $text,
            'time' => now()->timezone(config('app.timezone'))->format('H:i'),
        ];

        $conversation = $conversations[$index];
        $conversation['messages'][] = $message;
        $conversation['preview'] = mb_strimwidth($text, 0, 30, '...');
        $conversation['lastActive'] = 'Vua xong';
        $conversation['unread'] = $sender === 'them' ? ($conversation['unread'] ?? 0) + 1 : 0;

        array_splice($conversations, $index, 1);
        array_unshift($conversations, $conversation);

        $this->storeConversations($request, $conversations);

        return response()->json([
            'conversations' => array_values($conversations),
        ]);
    }

    private function getConversations(Request $request): array
    {
        $conversations = $request->session()->get(self::SESSION_KEY);

        if (is_array($conversations) && count($conversations)) {
            return array_values($conversations);
        }

        $seed = $this->seedConversations()->all();
        $this->storeConversations($request, $seed);

        return $seed;
    }

    private function storeConversations(Request $request, array $conversations): void
    {
        $request->session()->put(self::SESSION_KEY, array_values($conversations));
    }

    private function nextConversationId(array $conversations): int
    {
        return empty($conversations)
            ? 1
            : max(array_map(fn (array $conversation) => $conversation['id'], $conversations)) + 1;
    }

    private function buildAvatarUrl(string $name): string
    {
        return 'https://ui-avatars.com/api/?name='.rawurlencode($name).'&background=0f172a&color=7dd3fc';
    }

    private function seedConversations(): Collection
    {
        return collect([
            [
                'id' => 1,
                'name' => 'Minh Anh',
                'avatar' => $this->buildAvatarUrl('Minh Anh'),
                'lastActive' => 'Vua xong',
                'preview' => 'Dang soan tin...',
                'unread' => 1,
                'messages' => [
                    ['id' => 1, 'sender' => 'them', 'text' => 'Ban oi, giao dien chat den dau roi?', 'time' => '09:15'],
                    ['id' => 2, 'sender' => 'me', 'text' => 'Minh dang lam tiep day.', 'time' => '09:17'],
                ],
            ],
            [
                'id' => 2,
                'name' => 'Quoc Bao',
                'avatar' => $this->buildAvatarUrl('Quoc Bao'),
                'lastActive' => '12:45',
                'preview' => 'Hen gap o studio nhe!',
                'unread' => 0,
                'messages' => [
                    ['id' => 1, 'sender' => 'them', 'text' => 'Hen gap o studio nhe!', 'time' => '12:45'],
                    ['id' => 2, 'sender' => 'me', 'text' => 'Ok toi den som.', 'time' => '12:47'],
                ],
            ],
        ]);
    }
}
