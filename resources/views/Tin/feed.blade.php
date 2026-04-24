<!DOCTYPE html>
<html class="dark" lang="vi"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<title>Bảng tin | NHOMJ</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
                    "on-secondary-container": "#c0d8e8",
                    "error-container": "#3d1414",
                    "primary-fixed": "#c8eaff",
                    "surface-container-low": "#111828",
                    "on-primary-fixed-variant": "#004d73",
                    "tertiary-fixed": "#e8d0ff",
                    "background": "#0a0e1a",
                    "tertiary-container": "#3d2060",
                    "surface-variant": "#1a2438",
                    "outline-variant": "#2a3a48",
                    "primary": "#7dd3fc",
                    "tertiary": "#c8a0f0",
                    "inverse-on-surface": "#0a0e1a",
                    "surface-container": "#141c2e",
                    "on-tertiary-fixed-variant": "#4d2a73",
                    "on-secondary-fixed-variant": "#2a4a5e",
                    "on-error": "#1a0000",
                    "on-tertiary": "#1a002e",
                    "surface-container-lowest": "#0a0e1a",
                    "on-background": "#e0e8f0",
                    "on-surface-variant": "#a0b4c4",
                    "surface-bright": "#1a2438",
                    "surface-container-highest": "#202c42",
                    "outline": "#4a6070",
                    "secondary-container": "#1a3a4e",
                    "secondary": "#88b4cc",
                    "on-tertiary-fixed": "#1a002e",
                    "on-secondary": "#001f2e",
                    "on-primary": "#001f2e",
                    "secondary-fixed": "#c0d8e8",
                    "inverse-surface": "#e0e8f0",
                    "surface-dim": "#0f1524",
                    "surface-tint": "#7dd3fc",
                    "secondary-fixed-dim": "#88b4cc",
                    "on-secondary-fixed": "#0d1f2b",
                    "primary-container": "#0e4d6e",
                    "inverse-primary": "#0a4c6e",
                    "on-primary-container": "#c8eaff",
                    "on-tertiary-container": "#e8d0ff",
                    "on-surface": "#e0e8f0",
                    "on-primary-fixed": "#001f2e",
                    "error": "#ff6b6b",
                    "tertiary-fixed-dim": "#c8a0f0",
                    "surface-container-high": "#1a2438",
                    "surface": "#0f1524",
                    "on-error-container": "#ffb3b3",
                    "primary-fixed-dim": "#7dd3fc"
            },
            borderRadius: {
                    DEFAULT: "0.5rem",
                    lg: "1rem",
                    xl: "1.5rem",
                    full: "9999px"
            },
            fontFamily: {
                    headline: ["Inter"],
                    body: ["Inter"],
                    label: ["Inter"]
            }
          },
        },
      }
    </script>
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
        .glass-panel-elevated {
            background: rgba(15, 21, 36, 0.75);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(125, 211, 252, 0.15);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 48;
        }
    </style>
</head>
<body class="min-h-screen">
<header class="fixed top-0 w-full z-50 bg-[#0a0e1a]/60 backdrop-blur-xl border-b border-sky-400/10 flex justify-between items-center px-6 h-16 shadow-[0_0_30px_rgba(125,211,252,0.05)]">
<div class="flex items-center gap-8">
<h1 class="text-2xl font-bold bg-gradient-to-r from-sky-400 to-purple-400 bg-clip-text text-transparent tracking-tight">NHOMJ</h1>
<div class="hidden md:flex items-center bg-white/5 rounded-full px-4 py-1.5 border border-white/10">
<span class="material-symbols-outlined text-slate-400 text-xl">search</span>
<input class="bg-transparent border-none focus:ring-0 text-sm w-64 text-on-surface placeholder-slate-500" placeholder="Tìm kiếm trên NHOMJ..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 rounded-full hover:bg-sky-400/10 transition-all active:scale-95 duration-200">
<span class="material-symbols-outlined text-sky-300">notifications</span>
</button>
<button class="p-2 rounded-full hover:bg-sky-400/10 transition-all active:scale-95 duration-200">
<span class="material-symbols-outlined text-sky-300">mail</span>
</button>
<button class="flex items-center gap-2 p-1 pr-3 rounded-full hover:bg-sky-400/10 transition-all border border-white/5">
<img class="w-8 h-8 rounded-full border border-sky-400/30" src="https://via.placeholder.com/40" alt="Avatar"/>
<span class="material-symbols-outlined text-sky-300">account_circle</span>
</button>
</div>
</header>
<main class="pt-20 px-6 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8">
<aside class="hidden md:block md:col-span-3">
<nav class="sticky top-20 flex flex-col gap-2 p-4">
<div class="flex items-center gap-3 bg-sky-400/20 text-sky-300 rounded-xl px-4 py-3 border border-sky-400/20 cursor-pointer transition-transform active:translate-x-1">
<span class="material-symbols-outlined">home</span>
<span class="text-sm font-medium">Bảng tin</span>
</div>
<div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
<span class="material-symbols-outlined">explore</span>
<span class="text-sm font-medium">Khám phá</span>
</div>
<div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
<span class="material-symbols-outlined">notifications</span>
<span class="text-sm font-medium">Thông báo</span>
</div>
<div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
<span class="material-symbols-outlined">chat</span>
<span class="text-sm font-medium">Tin nhắn</span>
</div>
<div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
<span class="material-symbols-outlined">person</span>
<span class="text-sm font-medium">Hồ sơ</span>
</div>
<div class="mt-6 p-4 glass-panel rounded-2xl flex items-center gap-3">
<img class="w-10 h-10 rounded-full border border-sky-400/20" src="https://via.placeholder.com/40" alt="avatar"/>
<div class="flex flex-col">
<span class="text-sm font-bold text-sky-300">Người dùng NHOMJ</span>
<span class="text-xs text-slate-400">@nguoidung</span>
</div>
</div>
<button class="mt-4 w-full bg-gradient-to-r from-sky-500 to-blue-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-sky-500/20 hover:opacity-90 active:scale-[0.98] transition-all">Đăng bài mới</button>
</nav>
</aside>
<div class="md:col-span-6 space-y-6">
<section class="glass-panel rounded-2xl p-4">
<div class="flex gap-4">
<img class="w-12 h-12 rounded-full border border-sky-400/20" src="https://via.placeholder.com/48" alt="avatar"/>
<div class="w-full">
<textarea id="status-input" class="w-full bg-transparent border-none focus:ring-0 text-on-surface placeholder-slate-500 resize-none text-lg leading-relaxed" placeholder="Bạn đang nghĩ gì?" rows="3"></textarea>
<div class="h-px bg-white/5 my-3"></div>
<div class="flex flex-wrap items-center justify-between gap-2">
<div class="flex items-center gap-1">
<button class="p-2 text-sky-300 hover:bg-sky-400/10 rounded-lg transition-colors"><span class="material-symbols-outlined">image</span></button>
<button class="p-2 text-tertiary hover:bg-tertiary/10 rounded-lg transition-colors"><span class="material-symbols-outlined">gif_box</span></button>
<button class="p-2 text-green-400 hover:bg-green-400/10 rounded-lg transition-colors"><span class="material-symbols-outlined">label</span></button>
<button class="p-2 text-yellow-400 hover:bg-yellow-400/10 rounded-lg transition-colors"><span class="material-symbols-outlined">mood</span></button>
<button class="p-2 text-red-400 hover:bg-red-400/10 rounded-lg transition-colors"><span class="material-symbols-outlined">location_on</span></button>
<button class="p-2 text-primary hover:bg-sky-400/10 rounded-lg transition-colors"><span class="material-symbols-outlined">poll</span></button>
</div>
<button class="bg-primary/20 text-primary border border-primary/30 px-6 py-1.5 rounded-full font-semibold hover:bg-primary/30 transition-all">Đăng</button>
</div>
</div>
</div>
</section>
@php $currentUserId = auth()->id() ?? 1; @endphp
@forelse($posts as $post)
<article class="glass-panel rounded-2xl overflow-hidden">
<div class="p-4 flex items-center justify-between">
<div class="flex items-center gap-3">
<img class="w-10 h-10 rounded-full border border-sky-400/20" src="{{ $post->nguoiDung->anh_dai_dien ?? 'https://via.placeholder.com/40' }}" alt="Avatar"/>
<div>
<div class="flex items-center gap-1">
<h3 class="font-bold text-sm text-on-surface">{{ $post->nguoiDung->ten_dang_nhap }}</h3>
@if($post->da_chinh_sua)
<span class="material-symbols-outlined text-sky-400 text-xs" style="font-variation-settings: 'FILL' 1;">verified</span>
@endif
</div>
<p class="text-[10px] text-slate-400">{{ optional($post->created_at)->diffForHumans() }} • <span class="material-symbols-outlined text-[10px] align-middle">public</span></p>
</div>
</div>
<button class="text-slate-400 hover:text-on-surface transition-colors"><span class="material-symbols-outlined">more_horiz</span></button>
</div>
<div class="px-4 pb-3">
<p class="text-sm leading-relaxed text-on-surface-variant whitespace-pre-wrap">{{ $post->noi_dung }}</p>
</div>
<div class="p-4 border-t border-white/5">
<div class="flex items-center justify-between mb-4">
<div class="flex items-center gap-2">
<div class="flex -space-x-1">
<span class="w-5 h-5 rounded-full bg-blue-500 flex items-center justify-center ring-2 ring-surface border-none"><span class="material-symbols-outlined text-[10px] text-white">thumb_up</span></span>
<span class="w-5 h-5 rounded-full bg-red-500 flex items-center justify-center ring-2 ring-surface border-none"><span class="material-symbols-outlined text-[10px] text-white">favorite</span></span>
</div>
<span class="text-xs text-slate-400">Bạn và {{ $post->camXuc->count() > 0 ? $post->camXuc->count() - 1 : 0 }} người khác</span>
</div>
<span class="text-xs text-slate-400"><span id="comment-count-{{ $post->id }}">{{ $post->binhLuan->count() }}</span> bình luận</span>
</div>
<div class="flex items-center justify-around">
@php $postReaction = optional($post->camXuc->where('nguoi_dung_id', $currentUserId)->first())->loai_cam_xuc; @endphp
<div class="relative">
<button class="post-reaction-btn flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors py-1.5 px-4 rounded-xl hover:bg-sky-400/10"
        data-post-id="{{ $post->id }}"
        data-current-reaction="{{ $postReaction ?? '' }}">
<span class="material-symbols-outlined">thumb_up</span>
<span class="text-sm font-medium reaction-text">Thích</span>
<span class="post-reaction-count hidden">{{ $post->camXuc->count() }}</span>
</button>
<div class="reaction-popup absolute bottom-full mb-2 left-0 bg-surface rounded-xl p-2 shadow-lg border border-white/10 hidden flex gap-1">
    <button class="reaction-option p-2 rounded-lg hover:bg-white/10 transition-colors" data-reaction="thich">
        <span class="material-symbols-outlined text-blue-500">thumb_up</span>
    </button>
    <button class="reaction-option p-2 rounded-lg hover:bg-white/10 transition-colors" data-reaction="tim">
        <span class="material-symbols-outlined text-red-500">favorite</span>
    </button>
    <button class="reaction-option p-2 rounded-lg hover:bg-white/10 transition-colors" data-reaction="haha">
        <span class="material-symbols-outlined text-yellow-500">mood</span>
    </button>
    <button class="reaction-option p-2 rounded-lg hover:bg-white/10 transition-colors" data-reaction="wow">
        <span class="material-symbols-outlined text-purple-500">auto_awesome</span>
    </button>
    <button class="reaction-option p-2 rounded-lg hover:bg-white/10 transition-colors" data-reaction="buon">
        <span class="material-symbols-outlined text-orange-500">sentiment_dissatisfied</span>
    </button>
    <button class="reaction-option p-2 rounded-lg hover:bg-white/10 transition-colors" data-reaction="phan_no">
        <span class="material-symbols-outlined text-red-600">mood_bad</span>
    </button>
</div>
</div>
<button class="comment-toggle-btn flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors py-1.5 px-4 rounded-xl hover:bg-sky-400/10">
<span class="material-symbols-outlined">chat_bubble</span>
<span class="text-sm font-medium">Bình luận</span>
</button>
<button class="flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors py-1.5 px-4 rounded-xl hover:bg-sky-400/10">
<span class="material-symbols-outlined">share</span>
<span class="text-sm font-medium">Chia sẻ</span>
</button>
<button class="flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors py-1.5 px-4 rounded-xl hover:bg-sky-400/10">
<span class="material-symbols-outlined">bookmark</span>
</button>
</div>
</div>
<div class="px-4 pb-4 space-y-4 hidden comment-form" data-post-id="{{ $post->id }}">
<textarea id="comment-text-{{ $post->id }}" rows="3" class="w-full bg-surface border border-white/10 rounded-2xl p-4 text-on-surface placeholder-slate-500 focus:outline-none focus:border-sky-300" placeholder="Viết bình luận..."></textarea>
<div class="flex items-center justify-between gap-4">
<button class="post-comment-submit bg-gradient-to-r from-sky-500 to-blue-600 text-white font-semibold px-5 py-2 rounded-full shadow-lg shadow-sky-500/20 hover:opacity-90 transition-all" data-post-id="{{ $post->id }}">Gửi bình luận</button>
<span id="comment-feedback-{{ $post->id }}" class="text-sm text-green-300"></span>
</div>
</div>
<div id="comment-list-{{ $post->id }}" class="px-4 pb-6 space-y-4">
@foreach($post->binhLuan->take(3) as $comment)
<div class="bg-surface-container p-4 rounded-2xl border border-white/10">
<div class="flex items-center gap-3 mb-3">
<img class="w-10 h-10 rounded-full" src="{{ $comment->nguoiDung->anh_dai_dien ?? 'https://via.placeholder.com/40' }}" alt="Avatar"/>
<div>
<p class="font-semibold">{{ $comment->nguoiDung->ten_dang_nhap }}</p>
<p class="text-[10px] text-slate-400">{{ optional($comment->created_at)->diffForHumans() }}</p>
</div>
</div>
<p class="text-sm text-on-surface-variant mb-4">{{ $comment->noi_dung }}</p>
<div class="flex items-center gap-3 text-sm text-slate-400">
@php $commentReaction = optional($comment->camXuc->where('nguoi_dung_id', $currentUserId)->first())->loai_cam_xuc; @endphp
<button class="comment-reaction-btn flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors"
        data-comment-id="{{ $comment->id }}"
        data-current-reaction="{{ $commentReaction ?? '' }}">
<span class="material-symbols-outlined">thumb_up</span>
<span class="comment-reaction-count">{{ $comment->camXuc->count() }}</span>
</button>
</div>
</div>
@endforeach
</div>
</article>
@empty
<p class="text-center text-gray-400">Chưa có bài viết nào.</p>
@endforelse
</div>
<aside class="hidden md:block md:col-span-3 space-y-6">
<section class="glass-panel rounded-2xl p-4">
<h3 class="font-bold text-lg text-sky-300 mb-4 flex items-center gap-2"><span class="material-symbols-outlined">trending_up</span>Xu hướng</h3>
<div class="space-y-4">
<div class="group cursor-pointer">
<p class="text-xs text-slate-500">Đang thịnh hành tại Việt Nam</p>
<h4 class="font-bold text-sm group-hover:text-sky-300 transition-colors">#NHOMJ_Metaverse</h4>
<p class="text-xs text-slate-400">12.5k bài viết</p>
</div>
<div class="group cursor-pointer">
<p class="text-xs text-slate-500">Công nghệ</p>
<h4 class="font-bold text-sm group-hover:text-sky-300 transition-colors">#Web3_Development</h4>
<p class="text-xs text-slate-400">8.2k bài viết</p>
</div>
<div class="group cursor-pointer">
<p class="text-xs text-slate-500">Đời sống</p>
<h4 class="font-bold text-sm group-hover:text-sky-300 transition-colors">#DalatWinter</h4>
<p class="text-xs text-slate-400">5.9k bài viết</p>
</div>
</div>
<button class="mt-4 w-full py-2 text-sm font-medium text-sky-400 hover:bg-sky-400/10 rounded-xl transition-colors">Xem thêm</button>
</section>
<section class="glass-panel rounded-2xl p-4">
<h3 class="font-bold text-lg text-sky-300 mb-4">Gợi ý kết bạn</h3>
<div class="space-y-4">
@for($i = 0; $i < 3; $i++)
<div class="flex items-center justify-between gap-2">
<div class="flex items-center gap-3">
<img class="w-10 h-10 rounded-full border border-sky-400/20" src="https://via.placeholder.com/40" alt="avatar"/>
<div class="min-w-0">
<p class="text-sm font-bold truncate">Người dùng {{ $i + 1 }}</p>
<p class="text-[10px] text-slate-400">Gợi ý cho bạn</p>
</div>
</div>
<button class="bg-white/10 text-white text-xs font-bold px-3 py-1.5 rounded-full hover:bg-primary hover:text-on-primary transition-all">Theo dõi</button>
</div>
@endfor
</div>
</section>
<footer class="px-4 text-[10px] text-slate-500 space-y-2">
<div class="flex flex-wrap gap-x-3 gap-y-1">
<a class="hover:underline" href="#">Điều khoản</a>
<a class="hover:underline" href="#">Chính sách bảo mật</a>
<a class="hover:underline" href="#">Quyền riêng tư</a>
<a class="hover:underline" href="#">Quảng cáo</a>
</div>
<p>© 2024 NHOMJ Social Network</p>
</footer>
</aside>
</main>
<nav class="md:hidden fixed bottom-0 left-0 w-full bg-[#0a0e1a]/80 backdrop-blur-xl border-t border-sky-400/10 flex justify-around items-center h-16 z-50">
<button class="p-2 text-sky-300"><span class="material-symbols-outlined">home</span></button>
<button class="p-2 text-slate-400"><span class="material-symbols-outlined">explore</span></button>
<button class="p-2 text-slate-400"><span class="material-symbols-outlined">add_box</span></button>
<button class="p-2 text-slate-400"><span class="material-symbols-outlined">notifications</span></button>
<button class="p-2 text-slate-400"><span class="material-symbols-outlined">person</span></button>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const reactionTypes = ['thich', 'tim', 'haha', 'wow', 'buon', 'phan_no'];
        const reactionConfig = {
            thich: { icon: 'thumb_up', label: 'Thích', colorClass: 'text-blue-500' },
            tim: { icon: 'favorite', label: 'Yêu thích', colorClass: 'text-red-500' },
            haha: { icon: 'mood', label: 'Haha', colorClass: 'text-yellow-500' },
            wow: { icon: 'auto_awesome', label: 'Wow', colorClass: 'text-purple-500' },
            buon: { icon: 'sentiment_dissatisfied', label: 'Buồn', colorClass: 'text-orange-500' },
            phan_no: { icon: 'mood_bad', label: 'Phẫn nộ', colorClass: 'text-red-600' },
        };

        function getCsrfToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        function updateReactionButton(button, reaction, total) {
            if (!button) return;
            button.dataset.currentReaction = reaction || '';
            const iconNode = button.querySelector('.material-symbols-outlined');
            const textNode = button.querySelector('.reaction-text');
            const countNode = button.querySelector('.post-reaction-count, .comment-reaction-count');

            if (reaction && reactionConfig[reaction]) {
                const config = reactionConfig[reaction];
                if (iconNode) iconNode.textContent = config.icon;
                if (textNode) textNode.textContent = config.label;
                button.classList.remove('text-slate-400');
                button.classList.add(config.colorClass);
            } else {
                if (iconNode) iconNode.textContent = 'thumb_up';
                if (textNode) textNode.textContent = 'Thích';
                button.classList.remove('text-blue-500', 'text-red-500', 'text-yellow-500', 'text-purple-500', 'text-orange-500', 'text-red-600');
                button.classList.add('text-slate-400');
            }

            if (countNode) {
                countNode.textContent = total;
                countNode.classList.toggle('hidden', Number(total) <= 0);
            }
        }

        async function sendReaction(url, payload) {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCsrfToken(),
                },
                body: JSON.stringify(payload),
            });

            if (!response.ok) {
                return null;
            }

            return response.json();
        }

        function attachPostReactions() {
            document.querySelectorAll('.post-reaction-btn').forEach(button => {
                const popup = button.parentElement.querySelector('.reaction-popup');
                if (!popup) return;

                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isHidden = popup.classList.contains('hidden');
                    document.querySelectorAll('.reaction-popup').forEach(other => {
                        if (other !== popup) other.classList.add('hidden');
                    });
                    popup.classList.toggle('hidden', !isHidden);
                });
            });

            document.querySelectorAll('.reaction-option').forEach(option => {
                option.addEventListener('click', async function(e) {
                    e.stopPropagation();
                    const reaction = this.dataset.reaction;
                    const popup = this.closest('.reaction-popup');
                    const button = popup ? popup.previousElementSibling : null;
                    if (!button) return;
                    const postId = button.dataset.postId;
                    const data = await sendReaction(`/api/bai-viet/${postId}/reaction`, { loai_cam_xuc: reaction });
                    if (data) {
                        updateReactionButton(button, data.phan_ung_hien_tai, data.tong_so);
                    } else {
                        alert('Lỗi khi thả cảm xúc bài viết.');
                    }
                    popup.classList.add('hidden');
                });
            });
        }

        function attachCommentReactions(root = document) {
            root.querySelectorAll('.comment-reaction-btn').forEach(button => {
                button.addEventListener('click', async function(e) {
                    e.stopPropagation();
                    const commentId = this.dataset.commentId;
                    const currentReaction = this.dataset.currentReaction;
                    const nextIndex = reactionTypes.indexOf(currentReaction) + 1;
                    const nextReaction = reactionTypes[nextIndex >= reactionTypes.length ? 0 : nextIndex];
                    const data = await sendReaction(`/api/binh-luan/${commentId}/reaction`, { loai_cam_xuc: nextReaction });
                    if (data) {
                        updateReactionButton(this, data.phan_ung_hien_tai, data.tong_so);
                    } else {
                        alert('Lỗi khi thả cảm xúc bình luận.');
                    }
                });
            });
        }

        function attachCommentForms() {
            document.querySelectorAll('.post-comment-submit').forEach(button => {
                button.addEventListener('click', async function() {
                    const postId = this.dataset.postId;
                    const textarea = document.getElementById(`comment-text-${postId}`);
                    const feedback = document.getElementById(`comment-feedback-${postId}`);
                    const commentList = document.getElementById(`comment-list-${postId}`);
                    const commentCount = document.getElementById(`comment-count-${postId}`);

                    if (!textarea || !feedback || !commentList || !commentCount) return;
                    const content = textarea.value.trim();
                    if (!content) {
                        feedback.textContent = 'Vui lòng nhập bình luận.';
                        return;
                    }

                    const response = await fetch(`/api/bai-viet/${postId}/binh-luan`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': getCsrfToken(),
                        },
                        body: JSON.stringify({ noi_dung: content }),
                    });

                    if (!response.ok) {
                        feedback.textContent = 'Lỗi gửi bình luận.';
                        return;
                    }

                    const data = await response.json();
                    textarea.value = '';
                    feedback.textContent = 'Đã gửi bình luận.';
                    commentCount.textContent = Number(commentCount.textContent || 0) + 1;

                    const commentNode = document.createElement('div');
                    commentNode.className = 'bg-surface-container p-4 rounded-2xl border border-white/10';
                    commentNode.innerHTML = `
                        <div class="flex items-center gap-3 mb-3">
                            <img class="w-10 h-10 rounded-full" src="${data.nguoi_dung.anh_dai_dien ?? 'https://via.placeholder.com/40'}" alt="Avatar"/>
                            <div>
                                <p class="font-semibold">${data.nguoi_dung.ten_dang_nhap}</p>
                                <p class="text-[10px] text-slate-400">Vừa xong</p>
                            </div>
                        </div>
                        <p class="text-sm text-on-surface-variant mb-4">${data.noi_dung}</p>
                        <div class="flex items-center gap-3 text-sm text-slate-400">
                            <button class="comment-reaction-btn flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors" data-comment-id="${data.id}" data-current-reaction="">
                                <span class="material-symbols-outlined">thumb_up</span>
                                <span class="comment-reaction-count">0</span>
                            </button>
                        </div>
                    `;
                    commentList.prepend(commentNode);
                    attachCommentReactions(commentNode);
                });
            });
        }

        function attachCommentToggles() {
            document.querySelectorAll('.comment-toggle-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('article').querySelector('.comment-form');
                    if (!form) return;
                    form.classList.toggle('hidden');
                });
            });
        }

        function initializeReactionButtons() {
            document.querySelectorAll('.post-reaction-btn').forEach(button => {
                const reaction = button.dataset.currentReaction;
                const countNode = button.querySelector('.post-reaction-count');
                const total = countNode ? Number(countNode.textContent || 0) : 0;
                updateReactionButton(button, reaction, total);
            });
            document.querySelectorAll('.comment-reaction-btn').forEach(button => {
                const reaction = button.dataset.currentReaction;
                const countNode = button.querySelector('.comment-reaction-count');
                const total = countNode ? Number(countNode.textContent || 0) : 0;
                updateReactionButton(button, reaction, total);
            });
        }

        attachPostReactions();
        attachCommentReactions();
        attachCommentForms();
        attachCommentToggles();
        initializeReactionButtons();

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.post-reaction-btn') && !e.target.closest('.reaction-popup')) {
                document.querySelectorAll('.reaction-popup').forEach(popup => popup.classList.add('hidden'));
            }
        });
    });
    </script>
</body></html>