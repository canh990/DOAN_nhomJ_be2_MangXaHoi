<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login'    => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'login.required'    => 'Vui lòng nhập email hoặc số điện thoại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
        ]);

        $login    = $request->input('login');
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        // Xác định field: email hay số điện thoại
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'so_dien_thoai';

        if (!Auth::attempt([$field => $login, 'password' => $password], $remember)) {
            throw ValidationException::withMessages([
                'login' => 'Email/số điện thoại hoặc mật khẩu không đúng.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Đã đăng xuất thành công.');
    }
}
