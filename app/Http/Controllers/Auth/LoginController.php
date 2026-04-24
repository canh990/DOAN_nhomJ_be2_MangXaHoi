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
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'login.required' => 'Vui long nhap email, so dien thoai hoac ten dang nhap.',
            'password.required' => 'Vui long nhap mat khau.',
        ]);

        $login = trim($request->input('login'));
        $password = $request->input('password');
        $remember = $request->boolean('remember');

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } elseif (preg_match('/^[0-9+\\s().-]+$/', $login)) {
            $field = 'so_dien_thoai';
        } else {
            $field = 'ten_dang_nhap';
        }

        if (! Auth::attempt([$field => $login, 'password' => $password], $remember)) {
            throw ValidationException::withMessages([
                'login' => 'Thong tin dang nhap hoac mat khau khong dung.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('welcome'))->with('status', 'Da dang nhap thanh cong.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Da dang xuat thanh cong.');
    }
}
