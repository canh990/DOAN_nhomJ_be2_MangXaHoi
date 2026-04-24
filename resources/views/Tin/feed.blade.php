<!DOCTYPE html>
<html class="dark" lang="vi">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Bảng tin | NHOMJ</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
body{background:#0a0e1a;color:#e0e8f0;font-family:'Inter',sans-serif;}
.glass-panel{background:rgba(15,21,36,.7);backdrop-filter:blur(16px);border:1px solid rgba(125,211,252,.12);}
.material-symbols-outlined{font-variation-settings:'FILL' 0,'wght' 400,'GRAD' 0,'opsz' 48;}
img{object-fit:cover;}
</style>
</head>
<body class="min-h-screen">
<header class="fixed top-0 w-full z-50 bg-[#0a0e1a]/80 backdrop-blur-xl border-b border-sky-400/10 px-6 h-16 flex items-center justify-between">
<div class="flex items-center gap-6">
<h1 class="text-2xl font-bold bg-gradient-to-r from-sky-400 to-purple-400 bg-clip-text text-transparent">NHOMJ</h1>
</div>
<div class="flex items-center gap-3">
<button class="p-2 rounded-full hover:bg-sky-400/10"><span class="material-symbols-outlined">notifications</span></button>
<button class="p-2 rounded-full hover:bg-sky-400/10"><span class="material-symbols-outlined">mail</span></button>
<button class="flex items-center gap-2 p-1 pr-3 rounded-full hover:bg-sky-400/10 border border-white/10"><img class="w-8 h-8 rounded-full border border-sky-400/20" src="https://via.placeholder.com/40" alt="avatar"/><span class="material-symbols-outlined">account_circle</span></button>
</div>
</header>
<main class="pt-24 px-4 lg:px-8 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
<div class="lg:col-span-12 mb-4 text-xs text-slate-400">Feed view đã cập nhật - nếu bạn vẫn không thấy nội dung mới, hãy tải lại trình duyệt (Ctrl+F5).</div>
<aside class="hidden lg:block lg:col-span-3 space-y-4">
<div class="glass-panel rounded-2xl p-4">
<p class="text-sky-300 font-semibold mb-3">Bảng tin</p>
<nav class="space-y-2 text-slate-300 text-sm">
<a class="block px-3 py-2 rounded-xl hover:bg-white/5" href="#">Home</a>
<a class="block px-3 py-2 rounded-xl hover:bg-white/5" href="#">Khám phá</a>
<a class="block px-3 py-2 rounded-xl hover:bg-white/5" href="#">Thông báo</a>
<a class="block px-3 py-2 rounded-xl hover:bg-white/5" href="#">Tin nhắn</a>
</nav>
</div>
</aside>
<div class="lg:col-span-6 space-y-6">
<section class="glass-panel rounded-2xl p-4">
<div class="flex items-center gap-4">
<img class="w-12 h-12 rounded-full border border-sky-400/20" src="https://via.placeholder.com/48" alt="avatar"/>
<div class="flex-1">
<textarea class="w-full bg-transparent border border-white/10 rounded-2xl p-4 text-sm text-white placeholder-slate-500 focus:outline-none" rows="3" placeholder="Bạn đang nghĩ gì?"></textarea>
</div>
</div>
</section>
@php
    $currentUserId = auth()->id() ?? 1;
    $reactions = [
        'thich' => ['icon' => 'thumb_up', 'label' => 'Thích', 'color' => 'text-blue-500'],
        'tim' => ['icon' => 'favorite', 'label' => 'Yêu thích', 'color' => 'text-red-500'],
        'haha' => ['icon' => 'mood', 'label' => 'Haha', 'color' => 'text-yellow-500'],
        'wow' => ['icon' => 'auto_awesome', 'label' => 'Wow', 'color' => 'text-purple-500'],
        'buon' => ['icon' => 'sentiment_dissatisfied', 'label' => 'Buồn', 'color' => 'text-orange-500'],
        'phan_no' => ['icon' => 'mood_bad', 'label' => 'Phẫn nộ', 'color' => 'text-red-600'],
    ];
@endphp
@forelse($posts as $post)
    @php
        $postReaction = optional($post->camXuc->where('nguoi_dung_id', $currentUserId)->first())->loai_cam_xuc;
        $reactionLabel = isset($reactions[$postReaction]) ? $reactions[$postReaction]['label'] : 'Thích';

        $avatarPath = $post->nguoiDung->anh_dai_dien ?: '';
        if ($avatarPath && !preg_match('/^https?:\/\//', $avatarPath)) {
            $avatarPath = asset($avatarPath);
        }
        $avatar = $avatarPath ?: 'https://via.placeholder.com/40';

        $coverPath = optional($post->mediaBaiViet->first())->duong_dan;
        if ($coverPath && !preg_match('/^https?:\/\//', $coverPath)) {
            $coverPath = asset($coverPath);
        }
        $cover = $coverPath ?: 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1600&q=80';
    @endphp
    <article class="glass-panel rounded-2xl overflow-hidden">
        <div class="p-4 flex items-start justify-between gap-4">
            <div class="flex items-start gap-3">
                <img class="w-10 h-10 rounded-full border border-sky-400/20" src="{{ $avatar }}" alt="avatar" onerror="this.src='https://via.placeholder.com/40'"/>
                <div>
                    <p class="font-semibold">{{ $post->nguoiDung->ten_dang_nhap }}</p>
                    <p class="text-[10px] text-slate-400">{{ optional($post->created_at)->diffForHumans() }}</p>
                </div>
            </div>
            <button class="text-slate-400 hover:text-white"><span class="material-symbols-outlined">more_horiz</span></button>
        </div>
        <div class="px-4 pb-4">
            <p class="text-sm text-slate-100 mb-4">{{ $post->noi_dung }}</p>
            <img class="w-full h-64 rounded-3xl border border-white/10" src="{{ $cover }}" alt="post image" onerror="this.src='https://via.placeholder.com/800x450?text=No+Image'"/>
        </div>
        <div class="px-4 pb-4 border-t border-white/10 space-y-4">
            <div class="flex items-center justify-between text-xs text-slate-400">
                <span>{{ $post->camXuc->count() }} cảm xúc • {{ $post->binhLuan->count() }} bình luận</span>
                <span>0 chia sẻ</span>
            </div>
            <div class="flex flex-wrap gap-2">
                <button type="button" class="reaction-btn flex items-center gap-2 rounded-2xl border border-white/10 px-3 py-2" data-url="/api/bai-viet/{{ $post->id }}/reaction" data-current="{{ $postReaction }}">
                    <span class="material-symbols-outlined">thumb_up</span>
                    <span class="reaction-label">{{ $reactionLabel }}</span>
                </button>
                <button type="button" class="toggle-comments flex items-center gap-2 rounded-2xl border border-white/10 px-3 py-2">
                    <span class="material-symbols-outlined">chat_bubble</span>Bình luận
                </button>
            </div>
            <div class="comment-panel hidden space-y-3">
                <textarea class="comment-input w-full bg-slate-950 border border-white/10 rounded-2xl p-3 text-sm" rows="3" placeholder="Viết bình luận..."></textarea>
                <button type="button" class="send-comment rounded-2xl bg-sky-500 px-4 py-2 text-slate-950" data-post="{{ $post->id }}">Gửi</button>
            </div>
            <div class="space-y-3">
                @foreach($post->binhLuan->take(3) as $comment)
                    @php $commentReaction = optional($comment->camXuc->where('nguoi_dung_id', $currentUserId)->first())->loai_cam_xuc; @endphp
                    <div class="bg-slate-950 border border-white/10 rounded-2xl p-3">
                        <div class="flex items-center gap-2 mb-2">
                            <img class="w-8 h-8 rounded-full" src="{{ $comment->nguoiDung->anh_dai_dien ?: 'https://via.placeholder.com/40' }}" alt="avatar"/>
                            <span class="text-sm font-medium">{{ $comment->nguoiDung->ten_dang_nhap }}</span>
                        </div>
                        <p class="text-sm text-slate-200 mb-3">{{ $comment->noi_dung }}</p>
                        <button type="button" class="comment-reaction-btn flex items-center gap-2 text-slate-400 text-sm" data-url="/api/binh-luan/{{ $comment->id }}/reaction" data-current="{{ $commentReaction }}">
                            <span class="material-symbols-outlined">thumb_up</span>
                            <span>{{ $comment->camXuc->count() }}</span>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </article>
@empty
    <p class="text-slate-400">Chưa có bài viết.</p>
@endforelse
</div>
<aside class="hidden lg:block lg:col-span-3 space-y-4">
<div class="glass-panel rounded-2xl p-4">
<p class="text-sky-300 font-semibold mb-3">Gợi ý</p>
<div class="space-y-3">
<div class="flex items-center gap-3">
<img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="suggestion"/>
<div><p class="text-sm font-medium">Hương Ly</p><p class="text-[10px] text-slate-400">Gợi ý cho bạn</p></div>
</div>
<div class="flex items-center gap-3">
<img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="suggestion"/>
<div><p class="text-sm font-medium">Đức Anh</p><p class="text-[10px] text-slate-400">Có 3 bạn chung</p></div>
</div>
</div>
</div>
</aside>
</main>
<script>
const reactions = @json($reactions);
const keys = Object.keys(reactions);
const token = document.querySelector('meta[name=csrf-token]').content;
function renderReaction(btn, reaction) {
    if (!btn) return;
    btn.dataset.current = reaction || '';
    const label = btn.querySelector('.reaction-label');
    if (!label) return;
    keys.forEach(k => btn.classList.remove(reactions[k].color));
    if (reactions[reaction]) {
        label.textContent = reactions[reaction].label;
        btn.classList.add(reactions[reaction].color);
    } else {
        label.textContent = 'Thích';
    }
}
async function postJson(url, body) {
    const res = await fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: JSON.stringify(body),
    });
    if (!res.ok) {
        console.error('API lỗi', url, res.status, await res.text());
        return null;
    }
    return res.json();
}
document.addEventListener('click', async event => {
    const reactionBtn = event.target.closest('.reaction-btn, .comment-reaction-btn');
    if (reactionBtn) {
        const current = reactionBtn.dataset.current || '';
        const index = keys.indexOf(current);
        const next = keys[(index + 1 + keys.length) % keys.length];
        const data = await postJson(reactionBtn.dataset.url, { loai_cam_xuc: next });
        if (data) renderReaction(reactionBtn, data.phan_ung_hien_tai);
        return;
    }
    const toggle = event.target.closest('.toggle-comments');
    if (toggle) {
        toggle.closest('article').querySelector('.comment-panel').classList.toggle('hidden');
        return;
    }
    const send = event.target.closest('.send-comment');
    if (send) {
        const postId = send.dataset.post;
        const panel = send.closest('.comment-panel');
        const input = panel.querySelector('.comment-input');
        if (!input.value.trim()) return;
        const data = await postJson(`/api/bai-viet/${postId}/binh-luan`, { noi_dung: input.value.trim() });
        if (!data) return;
        input.value = '';
        const list = send.closest('article').querySelector('.space-y-3');
        const node = document.createElement('div');
        node.className = 'bg-slate-950 border border-white/10 rounded-2xl p-3';
        node.innerHTML = `<div class="flex items-center gap-2 mb-2"><img class="w-8 h-8 rounded-full" src="${data.nguoi_dung.anh_dai_dien || 'https://via.placeholder.com/40'}" alt="avatar"/><span class="text-sm font-medium">${data.nguoi_dung.ten_dang_nhap}</span></div><p class="text-sm text-slate-200 mb-3">${data.noi_dung}</p><button class="comment-reaction-btn flex items-center gap-2 text-slate-400 text-sm" data-url="/api/binh-luan/${data.id}/reaction" data-current=""><span class="material-symbols-outlined">thumb_up</span><span>0</span></button>`;
        list.prepend(node);
    }
});
</script>
</body>
</html>
