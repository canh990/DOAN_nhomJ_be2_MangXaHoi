<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Chuc mung! Ban da dang nhap thanh cong.</h1>
    <p>Chao mung ban den voi trang chu.</p>
    
    @if(auth()->check())
        <p>Ten nguoi dung: {{ auth()->user()->ten_dang_nhap }}</p>
        <p>Email: {{ auth()->user()->email }}</p>
    @endif

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Dang xuat</button>
    </form>
</body>
</html>
