<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class StatusController extends Controller
{
    private const SESSION_KEY = 'status.online.contacts';

    public function index(Request $request): View
    {
        return view('crud_user.online-status', [
            'initialContacts' => $this->getContacts($request),
            'statusRoutes' => [
                'update' => route('status.contacts.update', ['contact' => '__ID__']),
            ],
        ]);
    }

    public function update(Request $request, int $contactId): JsonResponse
    {
        $validated = $request->validate([
            'is_online' => ['required', 'boolean'],
            'note' => ['nullable', 'string', 'max:100'],
        ]);

        $contacts = $this->getContacts($request);
        $index = collect($contacts)->search(fn (array $contact) => $contact['id'] === $contactId);

        if ($index === false) {
            return response()->json(['message' => 'Contact not found.'], 404);
        }

        $contacts[$index]['is_online'] = (bool) $validated['is_online'];
        $contacts[$index]['note'] = trim((string) ($validated['note'] ?? '')) ?: ($validated['is_online'] ? 'Dang online' : 'Dang offline');
        $contacts[$index]['last_seen'] = $validated['is_online']
            ? 'Dang hoat dong ngay bay gio'
            : 'Vua offline luc '.now()->timezone(config('app.timezone'))->format('H:i');

        $request->session()->put(self::SESSION_KEY, array_values($contacts));

        return response()->json([
            'contacts' => array_values($contacts),
            'contact' => $contacts[$index],
        ]);
    }

    private function getContacts(Request $request): array
    {
        $contacts = $request->session()->get(self::SESSION_KEY);

        if (is_array($contacts) && count($contacts)) {
            return array_values($contacts);
        }

        $seed = $this->seedContacts()->all();
        $request->session()->put(self::SESSION_KEY, $seed);

        return $seed;
    }

    private function seedContacts(): Collection
    {
        return collect([
            [
                'id' => 1,
                'name' => 'Minh Anh',
                'avatar' => $this->avatar('Minh Anh'),
                'is_online' => true,
                'note' => 'Dang hoat dong',
                'last_seen' => 'Vua xong',
            ],
            [
                'id' => 2,
                'name' => 'Quoc Bao',
                'avatar' => $this->avatar('Quoc Bao'),
                'is_online' => true,
                'note' => 'Online tren mobile',
                'last_seen' => '12:45',
            ],
            [
                'id' => 3,
                'name' => 'Thuy Duong',
                'avatar' => $this->avatar('Thuy Duong'),
                'is_online' => false,
                'note' => 'Da xem gan day',
                'last_seen' => '10:20',
            ],
            [
                'id' => 4,
                'name' => 'Hoang Long',
                'avatar' => $this->avatar('Hoang Long'),
                'is_online' => false,
                'note' => 'Dang offline',
                'last_seen' => 'Hom qua',
            ],
        ]);
    }

    private function avatar(string $name): string
    {
        return 'https://ui-avatars.com/api/?name='.rawurlencode($name).'&background=0f172a&color=7dd3fc';
    }
}
