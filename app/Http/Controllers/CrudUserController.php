<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CrudUserController extends Controller
{
    public function dashboard(): RedirectResponse
    {
        return redirect()->route('user.list');
    }

    public function listUser(): View
    {
        $users = User::orderBy('id')->paginate(5);

        return view('crud_user.list', ['users' => $users]);
    }

    public function login(): View
    {
        return view('crud_user.login');
    }

    public function authUser(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('user.list');
        }

        return back()
            ->withErrors(['email' => 'Email hoặc mật khẩu không đúng.'])
            ->onlyInput('email');
    }

    public function createUser(): View
    {
        return view('crud_user.register');
    }

    public function showRegister(): View
    {
        return view('crud_user.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công');
    }

    public function ssignout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function readUser(User $user): View
    {
        return view('crud_user.show', ['user' => $user]);
    }

    public function editUser(User $user): View
    {
        return view('crud_user.edit', ['user' => $user]);
    }

    public function saveUser(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'like' => ['nullable', 'string', 'max:255'],
        ]);

        $user->update($validated);

        return redirect()->route('user.list')->with('success', 'Cập nhật user thành công');
    }

    public function deleteUser(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('user.list')->with('success', 'Xóa user thành công');
    }
}
