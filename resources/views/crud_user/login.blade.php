@extends('dashboard')

@push('styles')
<style>
    #login-wrapper {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        padding: 20px;
    }
    #login-wrapper .browser-mockup {
        width: 650px;
        border: 1px solid #999;
        padding: 5px;
        background: #fff;
    }
    #login-wrapper .address-bar {
        border: 1px solid #ccc;
        padding: 5px 10px;
        margin-bottom: 10px;
        color: #666;
        font-size: 13px;
        background: #f9f9f9;
    }
    #login-wrapper .nav-header,
    #login-wrapper .page-footer {
        border: 1px solid #333;
        padding: 8px;
        text-align: center;
        font-size: 13px;
        margin: 10px 0;
    }
    #login-wrapper .main-box {
        border: 1px solid #999;
        width: 85%;
        margin: 30px auto;
        padding: 30px;
        min-height: 250px;
        background-color: #fcfcfc;
    }
    #login-wrapper .main-box h3 {
        text-align: center;
        font-weight: normal;
        margin-top: 0;
        margin-bottom: 30px;
        font-size: 18px;
    }
    #login-wrapper .input-row {
        display: flex !important;
        margin-bottom: 15px;
        align-items: center;
    }
    #login-wrapper .input-row label {
        width: 120px !important;
        font-size: 14px;
        flex-shrink: 0;
        margin-bottom: 0 !important;
    }
    #login-wrapper .input-row input[type="text"],
    #login-wrapper .input-row input[type="password"] {
        flex: 1 !important;
        width: auto !important;
        border: 1px solid #333 !important;
        padding: 4px 6px !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        background: #fff !important;
        font-size: 14px !important;
        height: 28px !important;
    }
    #login-wrapper .input-row input:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: #333 !important;
    }
    #login-wrapper .remember-row {
        margin-left: 120px;
        font-size: 13px;
        margin-top: 10px;
    }
    #login-wrapper .action-row {
        margin-top: 30px;
        display: flex !important;
        justify-content: space-between;
        align-items: center;
    }
    #login-wrapper .forgot-link {
        color: #0056b3;
        font-size: 13px;
        text-decoration: none;
    }
    #login-wrapper .btn-action {
        background-color: #0056b3 !important;
        color: white !important;
        border: none !important;
        padding: 8px 20px !important;
        border-radius: 0 !important;
        font-size: 14px !important;
        cursor: pointer;
    }
    #login-wrapper .text-danger {
        color: red;
        font-size: 12px;
        margin-left: 8px;
    }
</style>
@endpush

@section('content')
<div id="login-wrapper">
    <div class="browser-mockup">

        <div style="font-size: 11px; color: #999; margin-bottom: 3px;">Lập trình web</div>
        

        <div class="nav-header">
            Home | <strong>Đăng nhập</strong> | Đăng ký
        </div>

        <div class="main-box">
            <h3>Màn hình đăng nhập</h3>

            <form method="POST" action="{{ route('user.authUser') }}">
                @csrf

                <div class="input-row">
                    <label for="email">Username</label>
                    <input type="text" id="email" name="email"
                           value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="input-row">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="remember-row">
                    <input type="checkbox" name="remember"> Ghi nhớ đăng nhập
                </div>

                <div class="action-row">
                    <a href="#" class="forgot-link">Quên mật khẩu</a>
                    <button type="submit" class="btn-action">Đăng nhập</button>
                </div>

            </form>
        </div>

        <div class="page-footer">
            HaiDang
        </div>

    </div>
</div>
@endsection