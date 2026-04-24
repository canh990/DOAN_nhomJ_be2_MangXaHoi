<!DOCTYPE html>
<html class="dark" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bảng tin | NHOMJ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <style>
        body {
            background-color: #0a0e1a;
            color: #e0e8f0;
            font-family: 'Inter', sans-serif;
        }

        .glass-panel {
            background: rgba(15, 21, 36, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(125, 211, 252, 0.1);
        }
    </style>
</head>

<body class="min-h-screen">

    <header class="fixed top-0 w-full z-50 bg-[#0a0e1a]/80 backdrop-blur-xl border-b border-sky-400/10 h-16 flex items-center px-6 justify-between">
        <h1 class="text-2xl font-bold bg-gradient-to-r from-sky-400 to-purple-400 bg-clip-text text-transparent">NHOMJ</h1>
        <div class="flex gap-4 text-sky-300">
            <span class="material-symbols-outlined">notifications</span>
            <span class="material-symbols-outlined">mail</span>
        </div>
    </header>

    <main class="pt-24 px-6 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8">
        <aside class="hidden md:block md:col-span-3 space-y-4">
            <nav class="glass-panel rounded-2xl p-4 space-y-2">
                <div class="flex items-center gap-3 text-sky-300 p-3 bg-sky-400/10 rounded-xl">
                    <span class="material-symbols-outlined">home</span> Bảng tin
                </div>
                <div class="flex items-center gap-3 text-slate-400 p-3">
                    <span class="material-symbols-outlined">explore</span> Khám phá
                </div>
            </nav>
        </aside>

        <div class="md:col-span-6 space-y-6">
            <section class="glass-panel rounded-2xl p-4">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <textarea name="noi_dung" class="w-full bg-transparent border-none focus:ring-0 text-white placeholder-slate-500" placeholder="Bạn đang nghĩ gì?" rows="3"></textarea>
                    <div class="flex justify-between items-center mt-3 pt-3 border-t border-white/5">
                        <input type="file" name="media[]" class="text-xs">
                        <button type="submit" class="bg-sky-500 text-white px-6 py-1.5 rounded-full font-bold">Đăng</button>
                    </div>
                </form>
            </section>

            @foreach($posts as $post)
            <article class="glass-panel rounded-2xl overflow-hidden">
                <div class="p-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-slate-700"></div>
                    <div>
                        <h3 class="font-bold text-sm">{{ $post->user->ten_dang_nhap ?? 'Người dùng' }}</h3>
                        <p class="text-[10px] text-slate-400">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="px-4 pb-4 text-sm">{{ $post->noi_dung }}</div>

                @if($post->media->isNotEmpty())
                <div class="h-64 bg-slate-800">
                    <img src="{{ asset('storage/' . $post->media->first()->duong_dan) }}" class="w-full h-full object-cover">
                </div>
                @endif
            </article>
            @endforeach
        </div>

        <aside class="hidden md:block md:col-span-3">
            <div class="glass-panel rounded-2xl p-4 text-sky-300 font-bold">Xu hướng</div>
        </aside>
    </main>

</body>

</html>