<!DOCTYPE html>
<!-- Trang chủ mạng xã hội NHOMJ - Bảng tin chính -->
<html class="dark" lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bảng tin | NHOMJ</title>

    <!-- CDN Tailwind CSS với plugins forms và container-queries -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Font chữ Montserrat từ Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <!-- Material Symbols Outlined icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <!-- Cấu hình Tailwind CSS tùy chỉnh -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        // Định nghĩa bảng màu Material Design 3 cho giao diện tối
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
                        // Cấu hình font chữ Montserrat cho toàn bộ ứng dụng
                        'montserrat': ["Montserrat"],
                        'roboto': ["Montserrat"],
                        headline: ["Montserrat"],
                        body: ["Montserrat"],
                        label: ["Montserrat"]
                    }
                }
            }
        }
    </script>

    <!-- CSS tùy chỉnh cho hiệu ứng glassmorphism -->
    <style>
        body {
            background-color: #0a0e1a;
            color: #e0e8f0;
            font-family: 'Montserrat', sans-serif;
        }

        /* Hiệu ứng kính mờ cho các panel */
        .glass-panel {
            background: rgba(15, 21, 36, 0.6);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(125, 211, 252, 0.1);
        }

        /* Hiệu ứng kính mờ nâng cao */
        .glass-panel-elevated {
            background: rgba(15, 21, 36, 0.75);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(125, 211, 252, 0.15);
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Header cố định với thanh điều hướng chính -->
    <header class="fixed top-0 w-full z-50 bg-[#0a0e1a]/60 backdrop-blur-xl border-b border-sky-400/10 flex justify-between items-center px-6 h-16 shadow-[0_0_30px_rgba(125,211,252,0.05)]">
        <div class="flex items-center gap-8">
            <!-- Logo NHOMJ với gradient -->
            <h1 class="text-2xl font-bold bg-gradient-to-r from-sky-400 to-purple-400 bg-clip-text text-transparent font-montserrat tracking-tight">NHOMJ</h1>

            <!-- Thanh tìm kiếm (ẩn trên mobile) -->
            <div class="hidden md:flex items-center bg-white/5 rounded-full px-4 py-1.5 border border-white/10">
                <span class="material-symbols-outlined text-slate-400 text-xl">search</span>
                <input class="bg-transparent border-none focus:ring-0 text-sm w-64 text-on-surface placeholder-slate-500" placeholder="Tìm kiếm trên NHOMJ..." type="text" />
            </div>
        </div>

        <!-- Các nút hành động header -->
        <div class="flex items-center gap-4">
            <!-- Nút thông báo -->
            <button class="p-2 rounded-full hover:bg-sky-400/10 transition-all active:scale-95 duration-200">
                <span class="material-symbols-outlined text-sky-300">notifications</span>
            </button>
            <!-- Nút tin nhắn -->
            <button class="p-2 rounded-full hover:bg-sky-400/10 transition-all active:scale-95 duration-200">
                <span class="material-symbols-outlined text-sky-300">mail</span>
            </button>
            <!-- Nút hồ sơ người dùng -->
            <button class="flex items-center gap-2 p-1 pr-3 rounded-full hover:bg-sky-400/10 transition-all border border-white/5">
                <img class="w-8 h-8 rounded-full border border-sky-400/30" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCTpaWKl8ZDebkHUHexnjhsQ2zIKAfKGsdQpoy5lEaU1AmzGyLCNEDrok921IfCaFw84J10rJYvTtn6XZU5rpKAkZ9eB2Dnzjqi0fp9We1evqQYKFYwbMdxc4FdQi4_AAaiTHgF6fYAdW97zCNOFCRFbsCwXi0VMhxSu3q41_An7JSfq4oXamCnnDk3AbhlcOtOEMDTJruEsd40roZUp2HU6MMf7vMzfKbykTUyw54gH8T9dSr_0hxlfr2Q61j9EPk8DB2mpPT9yMU" alt="Avatar" />
                <span class="material-symbols-outlined text-sky-300">account_circle</span>
            </button>
        </div>
    </header>


    <main class="pt-20 px-6 max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8">
        <!--    Menu điều hướng -->
        <aside class="hidden md:block md:col-span-3">
            <nav class="sticky top-20 flex flex-col gap-2 p-4">
                <!-- Menu Bảng tin -->
                <div class="flex items-center gap-3 bg-sky-400/20 text-sky-300 rounded-xl px-4 py-3 border border-sky-400/20 cursor-pointer transition-transform active:translate-x-1">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
                    <span class="text-sm font-medium">Bảng tin</span>
                </div>
                <!-- Menu Khám phá -->
                <div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
                    <span class="material-symbols-outlined">explore</span>
                    <span class="text-sm font-medium">Khám phá</span>
                </div>
                <!-- Menu Thông báo -->
                <div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="text-sm font-medium">Thông báo</span>
                </div>
                <!-- Menu Tin nhắn -->
                <div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
                    <span class="material-symbols-outlined">chat</span>
                    <span class="text-sm font-medium">Tin nhắn</span>
                </div>
                <!-- Menu Hồ sơ -->
                <div class="flex items-center gap-3 text-slate-400 px-4 py-3 hover:text-sky-200 hover:bg-white/5 rounded-xl transition-colors cursor-pointer active:translate-x-1">
                    <span class="material-symbols-outlined">person</span>
                    <span class="text-sm font-medium">Hồ sơ</span>
                </div>

                <!-- Thông tin người dùng hiện tại -->
                <div class="mt-6 p-4 glass-panel rounded-2xl flex items-center gap-3">
                    <img class="w-10 h-10 rounded-full border border-sky-400/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDro2kwkcIsB6va9jlV5dx_MwUzwMmNdDOJ1a-wdX0Et2iLJaTqgMCfk-T8GQLEA5PwZXeWxxDCoS_3xOPDLe-Qj6liQ_FdH-x8dtHggKHhFaIwfoTDbGn3U-aLG-dadKZnxyjzmOFapJtJHy6lmBdu3irGcxB9hdwzOI4cY1pw5JaB0aFhRxrNA18DrXztutae9NMpDlNIitrM9LHcgIPNSwD1Wmjb9myGKDj9KGyQTtjbIQASCNuIgU6MZiWr2-j7EJAsXVnJpD8" alt="Avatar" />
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-sky-300">Người dùng NHOMJ</span>
                        <span class="text-xs text-slate-400">@nguoidung</span>
                    </div>
                </div>

                <!-- Nút đăng bài mới -->
                <button class="mt-4 w-full bg-gradient-to-r from-sky-500 to-blue-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-sky-500/20 hover:opacity-90 active:scale-[0.98] transition-all">
                    Đăng bài mới
                </button>
            </nav>
        </aside>

        <!--Feed bài viết -->
        <div class="md:col-span-6 space-y-6">
            <!-- Form tạo bài viết mới -->
            <section class="glass-panel rounded-2xl p-4">
                <!-- Hiển thị thông báo thành công -->
                <?php if(session('success')): ?>
                <div class="mb-4 rounded-2xl border border-sky-400/20 bg-sky-400/10 p-4 text-sm text-sky-100">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>

                <!-- Hiển thị lỗi validation -->
                <?php if($errors->any()): ?>
                <div class="mb-4 rounded-2xl border border-red-400/20 bg-red-400/10 p-4 text-sm text-red-100">
                    <ul class="space-y-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Form đăng bài viết -->
                <form action="<?php echo e(route('post.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <div class="flex gap-4">
                        <img class="w-12 h-12 rounded-full border border-sky-400/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOXCy0MCsayENXFbmxUmuEH_lE8iYMjf7xD8yWtPJOAwC1QhCJtNefdP05ZGHBv5mw-oFf07EzbruZ9fgmci4fE-dVVhKkv63vD9G-6URuPGLcOIff8_rWWB1BTVTa5Y1sM898o_7NeKmYh4UKQ22sTWtJJHHEj00Z6dioSvbL5At5zoHnvOploiwPpMYY3UbGRFSjHOTFbVKVfin2AZzzLO45jYUJXE7k7bw2brfkymnqa93L-Q5ff-_1QShwMR_fXTSlvhi_-rw" alt="User avatar" />
                        <textarea name="noi_dung" rows="4" class="w-full bg-transparent border border-white/10 rounded-2xl p-4 text-sm text-on-surface placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-400/50" placeholder="Bạn đang nghĩ gì?"></textarea>
                    </div>
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-2 flex-wrap">
                            <!-- Nút chọn file ảnh/video -->
                            <label class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-300 cursor-pointer hover:bg-white/10 transition">
                                <span class="material-symbols-outlined text-sky-300">image</span>
                                <span>Ảnh/Video</span>
                                <input type="file" name="media[]" multiple accept="image/*,video/*" class="hidden" />
                            </label>
                        </div>
                        <!-- Nút đăng bài -->
                        <button type="submit" class="bg-primary/20 text-primary border border-primary/30 px-6 py-2 rounded-full font-semibold hover:bg-primary/30 transition-all">
                            Đăng
                        </button>
                    </div>
                </form>
            </section>

            <!-- Danh sách bài viết -->
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!-- Bài viết cá nhân -->
            <article class="glass-panel rounded-2xl overflow-hidden">
                <!-- Header bài viết với thông tin tác giả -->
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img class="w-10 h-10 rounded-full border border-sky-400/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPO0A4-rZFPaXgD9M5Cisr4tZ_DpNP0gcMKlWTo-jA2RGgypFLoNbT5efIsGmzGBAzv8tCnkt2ruRHI_vemVOvJw97QyfjPmTBhA0dp-mza5VnnQvq6JV8IKWjsSHeVBxHtfvBuUWgu1fOdLfYxXXuUFJfRK0686pFQv01rQQzT8uq_58iIK2SpylVq8211Ks-HSKgCbpOCfggh04h5zV1dPetnTsKAgvX6-ceSL80PlOGRn6ETrRpnxDcagF5dbV2KGStYN3dqDw" alt="Post author" />
                        <div>
                            <div class="flex items-center gap-1">
                                <h3 class="font-bold text-sm text-on-surface">Người dùng NHOMJ</h3>
                                <span class="material-symbols-outlined text-sky-400 text-xs" style="font-variation-settings: 'FILL' 1;">verified</span>
                            </div>
                            <p class="text-[10px] text-slate-400"><?php echo e($post->created_at->diffForHumans()); ?> • <span class="material-symbols-outlined text-[10px] align-middle">public</span></p>
                        </div>
                    </div>
                    <!-- Menu tùy chọn bài viết -->
                    <button class="text-slate-400 hover:text-on-surface transition-colors">
                        <span class="material-symbols-outlined">more_horiz</span>
                    </button>
                </div>

                <!-- Nội dung bài viết -->
                <?php if($post->noi_dung): ?>
                <div class="px-4 pb-3">
                    <p class="text-sm leading-relaxed text-on-surface-variant"><?php echo e($post->noi_dung); ?></p>
                </div>
                <?php endif; ?>

                <!-- Media bài viết (ảnh/video) -->
                <?php if($post->media->count()): ?>
                <div class="grid gap-2 px-4 pb-4">
                    <?php $__currentLoopData = $post->media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($media->loai === 'video'): ?>
                    <!-- Video player -->
                    <video controls class="w-full max-h-[500px] rounded-2xl bg-black">
                        <source src="<?php echo e(asset('storage/' . $media->duong_dan)); ?>" type="video/mp4" />
                        Trình duyệt của bạn không hỗ trợ thẻ video.
                    </video>
                    <?php else: ?>
                    <!-- Hiển thị ảnh -->
                    <img src="<?php echo e(asset('storage/' . $media->duong_dan)); ?>" alt="Post media" class="w-full rounded-2xl object-cover" />
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

                <!-- Phần tương tác bài viết -->
                <div class="p-4 border-t border-white/5">
                    <!-- Thống kê cảm xúc và bình luận -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <!-- Icon cảm xúc -->
                            <div class="flex -space-x-1">
                                <span class="w-5 h-5 rounded-full bg-blue-500 flex items-center justify-center ring-2 ring-surface border-none">
                                    <span class="material-symbols-outlined text-[10px] text-white" style="font-variation-settings: 'FILL' 1;">thumb_up</span>
                                </span>
                                <span class="w-5 h-5 rounded-full bg-red-500 flex items-center justify-center ring-2 ring-surface border-none">
                                    <span class="material-symbols-outlined text-[10px] text-white" style="font-variation-settings: 'FILL' 1;">favorite</span>
                                </span>
                            </div>
                            <span class="text-xs text-slate-400">Bạn và người khác</span>
                        </div>
                        <span class="text-xs text-slate-400">0 bình luận · 0 chia sẻ</span>
                    </div>

                    <!-- Các nút tương tác -->
                    <div class="flex items-center justify-around">
                        <button class="flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors py-1.5 px-4 rounded-xl hover:bg-sky-400/10">
                            <span class="material-symbols-outlined">thumb_up</span>
                            <span class="text-sm font-medium">Thích</span>
                        </button>
                        <button class="flex items-center gap-2 text-slate-400 hover:text-sky-300 transition-colors py-1.5 px-4 rounded-xl hover:bg-sky-400/10">
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
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Thông báo khi không có bài viết -->
            <div class="glass-panel rounded-2xl p-6 text-slate-300">
                Chưa có bài viết nào. Hãy thử đăng bài đầu tiên!
            </div>
            <?php endif; ?>
        </div>
        <!--Xu hướng và gợi ý kết bạn -->
        <aside class="hidden md:block md:col-span-3 space-y-6">
            <!-- Section xu hướng -->
            <section class="glass-panel rounded-2xl p-4">
                <h3 class="font-bold text-lg text-sky-300 mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined">trending_up</span>
                    Xu hướng
                </h3>
                <div class="space-y-4">
                    <div class="group cursor-pointer">
                        <p class="text-xs text-slate-500">Đang thành hình tại Việt Nam</p>
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
            <!-- Section gợi ý kết bạn -->
            <section class="glass-panel rounded-2xl p-4">
                <h3 class="font-bold text-lg text-sky-300 mb-4">Gợi ý kết bạn</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-3">
                            <img class="w-10 h-10 rounded-full border border-sky-400/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAB3wsBWcLlmee49MN2_2YuDW-rfbeIUeY_Vg-_U9YWmYbgbb4C6u-QPrXNQj7CEE_G1W967Z9-uG-bA_vNeQ6zJxyrgj_RNS0iIZzw4iZGUu2xqdC3kXRvhRnq1vKk3n0sQec-oc7QYFupfJ-NwfSfXF9NDsnKnb034-9Bp9iPfVqRRYNSiVbnSPP80chsDDHeX6K7b9jVV1oi7ANEcvQ_Oyz7YCP_xDJ9sstUNVAEtDlzb5jFadDFp6_mZ3GLI9D8vq2hxK54Q5M" alt="Friend suggestion" />
                            <div class="min-w-0">
                                <p class="text-sm font-bold truncate">Huong Ly</p>
                                <p class="text-[10px] text-slate-400">Gợi ý cho bạn</p>
                            </div>
                        </div>
                        <button class="bg-white/10 text-white text-xs font-bold px-3 py-1.5 rounded-full hover:bg-primary hover:text-on-primary transition-all">Theo dõi</button>
                    </div>
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-3">
                            <img class="w-10 h-10 rounded-full border border-sky-400/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCPIHdkZl2SdE9WZxl7Enp_uk-IO9q39pH5KHqhdTP1AMk88kPsig5RVgJMZkztUdmLCDB2AAxiuu2YsWfhRGgj7_hEkMKL__IWW_-Kv8zfpVCd3EkWkJ0CKDUjL1rHZ3vOOfbxQGvWFvn-4UlerGXlRiopWYVskZx3rfbDja_SRBPlqUrmOviioVt-T50GhbpmBL8qWojj1yRVH_XDa5Icfgn1GG-3MM3F3UuS00pS03zBBlW5tTbxqCOMpMucHdesfgOc1z4OBWw" alt="Friend suggestion" />
                            <div class="min-w-0">
                                <p class="text-sm font-bold truncate">Đức Anh</p>
                                <p class="text-[10px] text-slate-400">Có 3 bạn chung</p>
                            </div>
                        </div>
                        <button class="bg-white/10 text-white text-xs font-bold px-3 py-1.5 rounded-full hover:bg-primary hover:text-on-primary transition-all">Theo dõi</button>
                    </div>
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-3">
                            <img class="w-10 h-10 rounded-full border border-sky-400/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7mXIYFoyekHfT3MR6-iNVCLA3tD9vbUc3sZT-XNxpNrVPVBD_snHbjz6hxErZDg2x_3h2rQyGpo5GWgfqACMUdstfUpyY5_XaNFmr7zKuSX5DWPEuo98eYAJ6vSg7B8RcwkL_lwtTf2Gkosx-lglhshie_9kxpfTdWGnWluzElU2d74PJQW9pjToil6yYYpwkOZlPK0u3BZnhUkawoC3ytNC5l08fe7V5mJLVuXOzGzRrW1l963yXEy4Pj6CSPL20RLYyTdeOsJw" alt="Friend suggestion" />
                            <div class="min-w-0">
                                <p class="text-sm font-bold truncate">Thanh Thảo</p>
                                <p class="text-[10px] text-slate-400">Gợi ý cho bạn</p>
                            </div>
                        </div>
                        <button class="bg-white/10 text-white text-xs font-bold px-3 py-1.5 rounded-full hover:bg-primary hover:text-on-primary transition-all">Theo dõi</button>
                    </div>
                </div>
            </section>
            <!-- Footer với liên kết pháp lý -->
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
    <!-- Thanh điều hướng mobile (ẩn trên desktop) -->
    <nav class="md:hidden fixed bottom-0 left-0 w-full bg-[#0a0e1a]/80 backdrop-blur-xl border-t border-sky-400/10 flex justify-around items-center h-16 z-50">
        <!-- Nút Bảng tin -->
        <button class="p-2 text-sky-300">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
        </button>
        <!-- Nút Khám phá -->
        <button class="p-2 text-slate-400">
            <span class="material-symbols-outlined">explore</span>
        </button>
        <!-- Nút Đăng bài -->
        <button class="p-2 text-slate-400">
            <span class="material-symbols-outlined">add_box</span>
        </button>
        <!-- Nút Thông báo -->
        <button class="p-2 text-slate-400">
            <span class="material-symbols-outlined">notifications</span>
        </button>
        <!-- Nút Hồ sơ -->
        <button class="p-2 text-slate-400">
            <span class="material-symbols-outlined">person</span>
        </button>
    </nav>
</body>

</html><?php /**PATH D:\MonHoc\Back end 2\DOAN_nhomJ_be2_MangXaHoi\resources\views/welcome.blade.php ENDPATH**/ ?>