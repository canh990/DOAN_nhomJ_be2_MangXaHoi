<!DOCTYPE html>
<html class="dark" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NHOMJ | @yield('title', 'Bảng tin')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        .glass-panel {
            background: rgba(15, 21, 36, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(125, 211, 252, 0.1);
        }

        /*body nền tối */
        body {
            background-color: #0a0e1a;
            color: #e0e8f0;
        }
    </style>
</head>

<body class="min-h-screen">
    <header class="fixed top-0 w-full z-50 bg-[#0a0e1a]/60 backdrop-blur-xl border-b border-sky-400/10 h-16 flex items-center px-6">
        <h1 class="text-2xl font-bold bg-gradient-to-r from-sky-400 to-purple-400 bg-clip-text text-transparent">NHOMJ</h1>
    </header>

    <main class="pt-20">
        @yield('content')
    </main>
</body>

</html>