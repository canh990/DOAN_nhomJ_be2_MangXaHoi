<!doctype html>
<html class="dark" lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "on-background": "#e0e8f0",
              "inverse-primary": "#0a4c6e",
              "on-tertiary-container": "#e8d0ff",
              "inverse-surface": "#e0e8f0",
              "surface-dim": "#0f1524",
              primary: "#7dd3fc",
              "secondary-fixed": "#c0d8e8",
              "outline-variant": "#2a3a48",
              "on-surface": "#e0e8f0",
              "on-tertiary": "#1a002e",
              "on-primary": "#001f2e",
              "on-secondary-container": "#c0d8e8",
              "surface-variant": "#1a2438",
              "on-error-container": "#ffb3b3",
              "primary-fixed": "#c8eaff",
              tertiary: "#c8a0f0",
              "surface-container-lowest": "#0a0e1a",
              "on-secondary": "#001f2e",
              "primary-container": "#0e4d6e",
              "surface-container": "#141c2e",
              "on-tertiary-fixed": "#1a002e",
              "surface-container-high": "#1a2438",
              "secondary-fixed-dim": "#88b4cc",
              "secondary-container": "#1a3a4e",
              "on-error": "#1a0000",
              "on-surface-variant": "#a0b4c4",
              "primary-fixed-dim": "#7dd3fc",
              "on-secondary-fixed": "#0d1f2b",
              outline: "#4a6070",
              "error-container": "#3d1414",
              "on-tertiary-fixed-variant": "#4d2a73",
              "tertiary-container": "#3d2060",
              "surface-tint": "#7dd3fc",
              "inverse-on-surface": "#0a0e1a",
              "tertiary-fixed-dim": "#c8a0f0",
              secondary: "#88b4cc",
              "on-secondary-fixed-variant": "#2a4a5e",
              "on-primary-fixed-variant": "#004d73",
              error: "#ff6b6b",
              "on-primary-container": "#c8eaff",
              "tertiary-fixed": "#e8d0ff",
              background: "#0a0e1a",
              "surface-container-highest": "#202c42",
              "on-primary-fixed": "#001f2e",
              surface: "#0f1524",
              "surface-bright": "#1a2438",
              "surface-container-low": "#111828",
            },
            borderRadius: {
              DEFAULT: "0.5rem",
              lg: "1rem",
              xl: "1.5rem",
              full: "9999px",
            },
            fontFamily: {
              headline: ["Inter"],
              body: ["Inter"],
              label: ["Inter"],
            },
          },
        },
      };
    </script>
    <style>
      .glass-panel {
        background: rgba(15, 21, 36, 0.6);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(125, 211, 252, 0.1);
      }
      .glass-elevated {
        background: rgba(15, 21, 36, 0.75);
        backdrop-filter: blur(24px);
        border: 1px solid rgba(125, 211, 252, 0.15);
      }
      .material-symbols-outlined {
        font-variation-settings:
          "FILL" 0,
          "wght" 400,
          "GRAD" 0,
          "opsz" 24;
      }
      body {
        background-color: #0a0e1a;
        color: #e0e8f0;
        overflow: hidden;
      }
      ::-webkit-scrollbar {
        width: 4px;
      }
      ::-webkit-scrollbar-thumb {
        background: rgba(125, 211, 252, 0.2);
        border-radius: 10px;
      }
      .typing-indicator span {
        animation: wave 1.2s infinite ease-in-out;
        transform-origin: center;
      }
      .typing-indicator span:nth-child(1) {
        animation-delay: 0s;
      }
      .typing-indicator span:nth-child(2) {
        animation-delay: 0.2s;
      }
      .typing-indicator span:nth-child(3) {
        animation-delay: 0.4s;
      }
      @keyframes wave {
        0%,
        60%,
        100% {
          transform: translateY(0);
          opacity: 0.4;
        }
        30% {
          transform: translateY(-6px);
          opacity: 1;
        }
      }
      .message-in {
        animation: fadeSlideUp 0.2s ease-out;
      }
      @keyframes fadeSlideUp {
        from {
          opacity: 0;
          transform: translateY(12px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      textarea {
        scrollbar-width: thin;
      }
    </style>
  </head>
  <body class="font-body antialiased">
    <!-- SideNavBar -->
    <aside
      class="fixed left-0 top-0 bottom-0 flex flex-col py-6 h-full w-64 border-r border-sky-400/10 bg-[#0f1524]/75 backdrop-blur-3xl z-50"
    >
      <div class="px-6 mb-8 flex items-center gap-3">
        <div
          class="w-10 h-10 rounded-xl bg-primary/20 flex items-center justify-center border border-primary/30"
        >
          <span
            class="material-symbols-outlined text-primary"
            style="font-variation-settings: &quot;FILL&quot; 1"
            >ac_unit</span
          >
        </div>
        <div>
          <h1 class="text-lg font-bold text-sky-300">Glacier Chat</h1>
          <p
            class="text-[10px] text-sky-400 uppercase tracking-widest font-semibold"
          >
            Trực tuyến
          </p>
        </div>
      </div>
      <nav class="flex-1 px-3 space-y-2">
        <a
          class="flex items-center gap-4 px-4 py-3 cursor-pointer transition-all bg-sky-400/10 text-sky-300 border-r-2 border-sky-400"
        >
          <span
            class="material-symbols-outlined"
            style="font-variation-settings: &quot;FILL&quot; 1"
            >chat</span
          >
          <span class="font-medium">Tin nhắn</span>
        </a>
        <a
          class="flex items-center gap-4 px-4 py-3 cursor-pointer transition-all text-slate-400 hover:text-slate-200 hover:bg-white/5"
        >
          <span class="material-symbols-outlined">call</span>
          <span class="font-medium">Cuộc gọi</span>
        </a>
        <a
          class="flex items-center gap-4 px-4 py-3 cursor-pointer transition-all text-slate-400 hover:text-slate-200 hover:bg-white/5"
        >
          <span class="material-symbols-outlined">contacts</span>
          <span class="font-medium">Danh bạ</span>
        </a>
        <a
          class="flex items-center gap-4 px-4 py-3 cursor-pointer transition-all text-slate-400 hover:text-slate-200 hover:bg-white/5"
        >
          <span class="material-symbols-outlined">group</span>
          <span class="font-medium">Nhóm</span>
        </a>
        <a
          class="flex items-center gap-4 px-4 py-3 cursor-pointer transition-all text-slate-400 hover:text-slate-200 hover:bg-white/5"
        >
          <span class="material-symbols-outlined">archive</span>
          <span class="font-medium">Lưu trữ</span>
        </a>
      </nav>
      <div class="px-3 pt-6 border-t border-white/5">
        <a
          class="flex items-center gap-4 px-4 py-3 cursor-pointer transition-all text-slate-400 hover:text-slate-200 hover:bg-white/5"
        >
          <span class="material-symbols-outlined">settings</span>
          <span class="font-medium">Cài đặt</span>
        </a>
        <div
          class="mt-6 flex items-center gap-3 px-4 py-3 glass-panel rounded-xl"
        >
          <img
            alt="Avatar Alex"
            class="w-8 h-8 rounded-full border border-primary/20 object-cover"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCzMRDU0A2UlJRYetdW5JZdmdgTKo7ES8LCwx5RSx7km2hnDvHxUbmvFbTm5WghnGBDKiJgn8cWmBZGMU0onkWbiIQlZgMZfqEsqCmX7dYyzcmR3ru5iFRgUW7GCPJy0QQIPq5rYZg1e-e2e28-k-2Gt9x_HL1W45aNzVR9KjUUL3-T069rENoSm6yPk63qZd23aMc5OuuQW0Baf-7JMoGm62kMNLR0_8oYoVhoL4erCBJFVnP0q6iO2drDJsYDm1_ymvb2SXT2vh4"
          />
          <div class="overflow-hidden">
            <p class="text-sm font-semibold truncate text-on-surface">
              Alex Nguyen
            </p>
            <p class="text-xs text-on-surface-variant truncate">
              Thiết lập trạng thái
            </p>
          </div>
        </div>
      </div>
    </aside>
    <!-- Main Content Canvas -->
    <main class="ml-64 flex h-screen overflow-hidden">
      <!-- Left: Chat List -->
      <section
        class="w-80 border-r border-sky-400/10 flex flex-col glass-panel"
      >
        <div class="p-6">
          <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-on-background">Tin nhắn</h2>
            <div class="flex items-center gap-2">
              <button
                id="addFriendButton"
                class="px-3 h-8 rounded-full bg-primary/10 flex items-center justify-center gap-1 text-primary hover:bg-primary/20 transition-colors text-xs font-semibold"
                type="button"
              >
                <span class="material-symbols-outlined text-sm">person_add</span>
                <span>Them ban</span>
              </button>
              <button
                class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary hover:bg-primary/20 transition-colors"
                type="button"
              >
                <span class="material-symbols-outlined text-sm">edit_square</span>
              </button>
            </div>
          </div>
          <div class="relative">
            <span
              class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-lg"
              >search</span
            >
            <input
              class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg py-2 pl-10 pr-4 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all"
              placeholder="Tìm kiếm cuộc trò chuyện..."
              type="text"
              id="searchInput"
            />
          </div>
        </div>
        <div
          class="flex-1 overflow-y-auto px-2 pb-6 space-y-1"
          id="chatListContainer"
        >
          <!-- Chat list items dynamically via JS but static fallback included -->
        </div>
      </section>

      <!-- Right: Chat Window -->
      <section class="flex-1 flex flex-col relative" id="chatWindowSection">
        <!-- Header -->
        <header
          class="h-16 flex items-center justify-between px-6 border-b border-sky-400/10 glass-elevated z-10"
        >
          <div class="flex items-center gap-4" id="chatHeaderInfo">
            <div class="relative">
              <img
                id="headerAvatar"
                class="w-10 h-10 rounded-full border border-primary/20 object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAAWpxD2n_Kjeh4YpfWri7mDxmnSYZ2C6fJdwQezNWNOFyPxQFG_tt553J6PToCbfiyrgO-KNAkKXHY2FLiB2ROXEGt5nGYWM4Xw9qB7RSVdJy8PGkkkJsluQELxOZZDiv5eL_YHKn9nE_Ojp1sJ9n1RQXLo1sl0TlDxo0NaFCLSu7Y9ej84LWwg28NGBaGNIPtL15mROVQmH_XoLH9zDdQ794nePa_VfBq9noCrIVFXZgRnjNuV--5ELwnFuiB76WXkbwHVRcNI1A"
              />
              <div
                class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-500 border-2 border-surface-container rounded-full shadow-sm"
              ></div>
            </div>
            <div>
              <h2
                id="chatName"
                class="font-bold text-on-background leading-none"
              >
                Minh Anh
              </h2>
              <span
                id="chatStatus"
                class="text-[11px] text-emerald-400 font-medium"
                >Đang hoạt động</span
              >
            </div>
          </div>
          <div class="flex items-center gap-1">
            <button
              class="w-10 h-10 rounded-full hover:bg-white/5 flex items-center justify-center text-on-surface-variant transition-all"
            >
              <span class="material-symbols-outlined">call</span>
            </button>
            <button
              class="w-10 h-10 rounded-full hover:bg-white/5 flex items-center justify-center text-on-surface-variant transition-all"
            >
              <span class="material-symbols-outlined">videocam</span>
            </button>
            <div class="w-[1px] h-6 bg-white/10 mx-2"></div>
            <button
              class="w-10 h-10 rounded-full hover:bg-white/5 flex items-center justify-center text-on-surface-variant transition-all"
            >
              <span class="material-symbols-outlined">settings</span>
            </button>
          </div>
        </header>
        <!-- Chat Messages Area -->
        <div
          class="flex-1 overflow-y-auto p-6 space-y-6 bg-[radial-gradient(circle_at_top_right,_rgba(125,211,252,0.03),_transparent_40%)]"
          id="messagesContainer"
        >
          <div class="flex justify-center">
            <span
              class="px-3 py-1 bg-white/5 rounded-full text-[10px] font-medium text-on-surface-variant uppercase tracking-widest"
              >Hôm nay</span
            >
          </div>
          <!-- messages will be injected here -->
        </div>
        <!-- Input Area -->
        <footer class="p-6 pt-2">
          <div
            class="glass-elevated rounded-2xl p-2 border border-sky-400/20 shadow-[0_-10px_40px_rgba(10,14,26,0.5)]"
          >
            <div class="flex items-end gap-2">
              <div class="flex items-center gap-1 pb-1 pl-1">
                <button
                  class="w-10 h-10 rounded-xl hover:bg-white/5 flex items-center justify-center text-on-surface-variant transition-all"
                >
                  <span class="material-symbols-outlined">add_circle</span>
                </button>
                <button
                  class="w-10 h-10 rounded-xl hover:bg-white/5 flex items-center justify-center text-on-surface-variant transition-all"
                >
                  <span class="material-symbols-outlined"
                    >sentiment_satisfied</span
                  >
                </button>
              </div>
              <div
                class="flex-1 bg-surface-container-low rounded-xl px-4 py-3 min-h-[44px] flex items-center border border-white/5"
              >
                <textarea
                  id="messageInput"
                  class="w-full bg-transparent border-none p-0 focus:ring-0 text-sm text-on-surface resize-none placeholder:text-on-surface-variant/50 focus:outline-none"
                  placeholder="Nhập tin nhắn của bạn..."
                  rows="1"
                ></textarea>
              </div>
              <div class="flex items-center gap-1 pb-1 pr-1">
                <button
                  id="micButton"
                  class="w-10 h-10 rounded-xl hover:bg-white/5 flex items-center justify-center text-on-surface-variant transition-all"
                >
                  <span class="material-symbols-outlined">mic</span>
                </button>
                <button
                  id="sendButton"
                  class="w-10 h-10 rounded-xl bg-primary text-on-primary flex items-center justify-center shadow-[0_0_15px_rgba(125,211,252,0.3)] transition-all active:scale-95"
                >
                  <span
                    class="material-symbols-outlined"
                    style="font-variation-settings: &quot;FILL&quot; 1"
                    >send</span
                  >
                </button>
              </div>
            </div>
          </div>
        </footer>
      </section>
    </main>
    <div
      class="fixed top-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-primary/5 blur-[120px] -z-10"
    ></div>
    <div
      class="fixed bottom-[-10%] left-[20%] w-[30%] h-[30%] rounded-full bg-tertiary/5 blur-[100px] -z-10"
    ></div>

    <div
      id="addFriendModal"
      class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/50 px-4 backdrop-blur-sm"
    >
      <div
        class="w-full max-w-md rounded-3xl glass-elevated border border-sky-400/20 p-6 shadow-[0_20px_80px_rgba(10,14,26,0.65)]"
      >
        <div class="flex items-start justify-between gap-4 mb-5">
          <div>
            <h3 class="text-lg font-bold text-on-background">Thêm bạn mới</h3>
            <p class="text-sm text-on-surface-variant">
              Tạo nhanh một cuộc trò chuyện mới trong danh sách.
            </p>
          </div>
          <button
            id="closeAddFriendModal"
            class="w-9 h-9 rounded-full hover:bg-white/5 flex items-center justify-center text-on-surface-variant"
            type="button"
          >
            <span class="material-symbols-outlined">close</span>
          </button>
        </div>

        <form id="addFriendForm" class="space-y-4">
          <div>
            <label class="block text-xs uppercase tracking-[0.2em] text-on-surface-variant mb-2">
              Tên hiển thị
            </label>
            <input
              id="friendNameInput"
              class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all"
              placeholder="Ví dụ: Lan Chi"
              type="text"
              required
            />
          </div>
          <div>
            <label class="block text-xs uppercase tracking-[0.2em] text-on-surface-variant mb-2">
              Trang thái
            </label>
            <input
              id="friendStatusInput"
              class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all"
              placeholder="Online"
              type="text"
            />
          </div>
          <div>
            <label class="block text-xs uppercase tracking-[0.2em] text-on-surface-variant mb-2">
              Avatar URL
            </label>
            <input
              id="friendAvatarInput"
              class="w-full bg-surface-container-low border border-outline-variant/30 rounded-xl py-3 px-4 text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all"
              placeholder="https://example.com/avatar.jpg"
              type="url"
            />
          </div>
          <div class="rounded-2xl bg-primary/5 border border-primary/10 px-4 py-3 text-xs text-on-surface-variant">
            Nếu bỏ trống avatar, hệ thống sẽ tự động gán avatar mặc định.
          </div>
          <div class="flex items-center justify-end gap-2 pt-2">
            <button
              id="cancelAddFriendButton"
              class="px-4 h-10 rounded-xl border border-white/10 text-on-surface-variant hover:bg-white/5 transition-colors"
              type="button"
            >
              Huy
            </button>
            <button
              class="px-4 h-10 rounded-xl bg-primary text-on-primary font-semibold hover:brightness-110 transition-all"
              type="submit"
            >
              Tạo cuộc trò chuyện
            </button>
          </div>
        </form>
      </div>
    </div>

    <script>
      // ---------- CHAT DATA MODEL ----------
      const defaultAvatar =
        "https://ui-avatars.com/api/?name=New+Friend&background=0f172a&color=7dd3fc";
      const CHAT_STORAGE_KEY = "glacier-chat-conversations";
      const ACTIVE_CHAT_STORAGE_KEY = "glacier-chat-active-id";
      const seedConversations = [
        {
          id: 1,
          name: "Minh Anh",
          avatar:
            "https://lh3.googleusercontent.com/aida-public/AB6AXuAAWpxD2n_Kjeh4YpfWri7mDxmnSYZ2C6fJdwQezNWNOFyPxQFG_tt553J6PToCbfiyrgO-KNAkKXHY2FLiB2ROXEGt5nGYWM4Xw9qB7RSVdJy8PGkkkJsluQELxOZZDiv5eL_YHKn9nE_Ojp1sJ9n1RQXLo1sl0TlDxo0NaFCLSu7Y9ej84LWwg28NGBaGNIPtL15mROVQmH_XoLH9zDdQ794nePa_VfBq9noCrIVFXZgRnjNuV--5ELwnFuiB76WXkbwHVRcNI1A",
          status: "Online",
          lastActive: "Vừa xong",
          preview: "Đang soạn tin...",
          unread: 3,
          messages: [
            {
              id: 1,
              sender: "them",
              text: "Chào Alex! Bạn đã xem bản phác thảo thiết kế UI mới của mình chưa?",
              time: "09:15 AM",
              type: "text",
            },
            {
              id: 2,
              sender: "me",
              text: "Mình vừa xem rồi, phong cách Glassmorphism trông rất hiện đại và tinh tế!",
              time: "09:17 AM",
              type: "text",
            },
            {
              id: 3,
              sender: "them",
              text: "",
              time: "09:18 AM",
              type: "voice",
              duration: "0:12",
              waveform: true,
            },
          ],
        },
        {
          id: 2,
          name: "Quốc Bảo",
          avatar:
            "https://lh3.googleusercontent.com/aida-public/AB6AXuCgaKq18DWhytQES7SvlbtGTF5dGzmrcuyttsz2cc0QVMAvC-6sXMmw3fAkY9G5zevWHeGLaWnwqFt0Rjl436_VoOayJJvHN5ypCTL-M0hLjq0uzZKizmLgi8LKApEuSQoheoEXMHKlDO0OmJh1X-aZY2jUd8qbE44RSlXVuD3qw0PCOkBQ-Vo8WzPuME5dYbQsPm5h0BAOV_JtcrSt6nfUFanBsCgwFCJy9x3ugecMH6QodeX7QhMtUtRXVAiZ-hnR4VNWK6XPYs0",
          status: "Online",
          lastActive: "12:45",
          preview: "Hẹn gặp ông ở studio nhé!",
          unread: 0,
          messages: [
            {
              id: 1,
              sender: "them",
              text: "Hẹn gặp ông ở studio nhé!",
              time: "12:45 PM",
              type: "text",
            },
            {
              id: 2,
              sender: "me",
              text: "Ok tôi đến sớm.",
              time: "12:47 PM",
              type: "text",
            },
          ],
        },
        {
          id: 3,
          name: "Thùy Dương",
          avatar:
            "https://lh3.googleusercontent.com/aida-public/AB6AXuCTCD5Qs8SYuvP1agd22dw79HXfheAJMYPvfzjnZdjjUdPYehn-s1vGT0RhJmdpAgOeFPcPIxQn_X2--RWKqgHMQHNJhKg1gg4myIzi5SxbOwFE99xMdPSJDcmwM8TenZNc6SEkHWm5IANEmsukR9_YirQPQxNAiWed_L1C2rLvtpT4Z7Tx2K6DfUCW1vXmS9cvnI8W0jUaFKqyUzxzHAu9IzUiN6VVYoX31zSBKQwic_cOSVjeiitVMsgmCe7DsrfLcyuip6onI5c",
          status: "Đã xem",
          lastActive: "10:20",
          preview: "Tin nhắn thoại (0:15)",
          unread: 0,
          messages: [
            {
              id: 1,
              sender: "them",
              text: "Bạn có nghe bản nhạc mới của tui không?",
              time: "10:20 AM",
              type: "text",
            },
          ],
        },
        {
          id: 4,
          name: "Hoàng Long",
          avatar:
            "https://lh3.googleusercontent.com/aida-public/AB6AXuA1MD5KeEz6C9buaj2GhaPaeziCpCLa-HG2NNE0xe3UBJ8zrrhAMmJLsAbzea1Bgz4_42Xe47Dpl7v--g6u7oKAk4OsZef9N3jcgZ5DuGoNt4gVsfFu9rTzR1xxRbOulHHlg-uqDeFCbILsCX6CWlcSyxcdNx2PqQHwh0hAuQPfJxIEVMqlKfSgug_tXo085nPv1Hkut2HoirjhVF1Lc-cyS7WXHR-QD-H3wCzX7i7B2LMr1Z_1G2arzxsTYjgfsW8NT2k-eH7IQX8",
          status: "Offline",
          lastActive: "Hôm qua",
          preview: "Cảm ơn bạn nhiều nhé!",
          unread: 0,
          messages: [
            {
              id: 1,
              sender: "them",
              text: "Cảm ơn bạn nhiều nhé!",
              time: "Hôm qua",
              type: "text",
            },
          ],
        },
      ];

      function cloneSeedConversations() {
        return JSON.parse(JSON.stringify(seedConversations));
      }

      function loadConversations() {
        try {
          const saved = localStorage.getItem(CHAT_STORAGE_KEY);
          if (!saved) return cloneSeedConversations();
          const parsed = JSON.parse(saved);
          return Array.isArray(parsed) && parsed.length
            ? parsed
            : cloneSeedConversations();
        } catch (error) {
          return cloneSeedConversations();
        }
      }

      function buildAvatarUrl(name) {
        return `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=0f172a&color=7dd3fc`;
      }

      let conversations = loadConversations();
      let activeChatId =
        Number(localStorage.getItem(ACTIVE_CHAT_STORAGE_KEY)) ||
        conversations[0]?.id ||
        1;
      let currentMessages =
        conversations.find((c) => c.id === activeChatId)?.messages?.slice() ||
        [];

      function persistState() {
        localStorage.setItem(CHAT_STORAGE_KEY, JSON.stringify(conversations));
        localStorage.setItem(ACTIVE_CHAT_STORAGE_KEY, String(activeChatId));
      }

      function getNextConversationId() {
        return conversations.length
          ? Math.max(...conversations.map((conv) => conv.id)) + 1
          : 1;
      }

      function openAddFriendModal() {
        const modal = document.getElementById("addFriendModal");
        if (!modal) return;
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.getElementById("friendNameInput")?.focus();
      }

      function closeAddFriendModal() {
        const modal = document.getElementById("addFriendModal");
        if (!modal) return;
        modal.classList.add("hidden");
        modal.classList.remove("flex");
        document.getElementById("addFriendForm")?.reset();
      }

      function createConversation(name, status, avatar) {
        const normalizedName = name.trim();
        if (!normalizedName) return;

        const duplicatedConversation = conversations.find(
          (conv) => conv.name.toLowerCase() === normalizedName.toLowerCase(),
        );
        if (duplicatedConversation) {
          activeChatId = duplicatedConversation.id;
          currentMessages = [...duplicatedConversation.messages];
          renderChatList();
          renderMessages();
          updateChatHeader();
          persistState();
          closeAddFriendModal();
          return;
        }

        const newConversation = {
          id: getNextConversationId(),
          name: normalizedName,
          avatar: avatar.trim() || buildAvatarUrl(normalizedName) || defaultAvatar,
          status: status.trim() || "Mới kết nối",
          lastActive: "Vừa xong",
          preview: "Hãy gửi lời chào đầu tiên...",
          unread: 0,
          messages: [
            {
              id: Date.now(),
              sender: "them",
              text: `Xin chào, mình là ${normalizedName}.`,
              time: formatTimeLabel(new Date()),
              type: "text",
            },
          ],
        };

        conversations.unshift(newConversation);
        activeChatId = newConversation.id;
        currentMessages = [...newConversation.messages];
        renderChatList();
        renderMessages();
        updateChatHeader();
        persistState();
        closeAddFriendModal();
      }

      // Helper: Render Chat List
      function renderChatList() {
        const container = document.getElementById("chatListContainer");
        const searchTerm =
          document.getElementById("searchInput")?.value.toLowerCase() || "";
        const filtered = conversations.filter((conv) =>
          conv.name.toLowerCase().includes(searchTerm),
        );

        if (!filtered.length) {
          container.innerHTML = `
            <div class="mx-2 rounded-2xl border border-dashed border-white/10 bg-white/5 px-4 py-6 text-center">
              <p class="text-sm font-semibold text-on-surface">Khong tim thay cuoc tro chuyen</p>
              <p class="mt-1 text-xs text-on-surface-variant">Thu doi tu khoa hoac bam Them ban de tao moi.</p>
            </div>
          `;
          return;
        }

        container.innerHTML = filtered
          .map(
            (conv) => `
            <div class="flex items-center gap-3 p-3 rounded-xl transition-all cursor-pointer ${activeChatId === conv.id ? "bg-sky-400/5 border border-sky-400/10" : "hover:bg-white/5 group"}" data-chat-id="${conv.id}">
                <div class="relative">
                    <img class="w-12 h-12 rounded-full border ${activeChatId === conv.id ? "border-primary/30" : "border-white/5 group-hover:border-white/20"} object-cover" src="${conv.avatar}" alt="${conv.name}">
                    <div class="absolute bottom-0 right-0 w-3 h-3 ${conv.status === "Đang hoạt động" || conv.status === "Online" ? "bg-emerald-500" : "bg-gray-500"} border-2 border-surface-container rounded-full shadow-sm"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-0.5">
                        <h3 class="font-semibold text-sm text-on-surface truncate">${conv.name}</h3>
                        <span class="text-[10px] ${activeChatId === conv.id ? "text-primary font-medium" : "text-on-surface-variant"}">${conv.lastActive}</span>
                    </div>
                    <p class="text-xs ${activeChatId === conv.id ? "text-primary truncate font-medium" : "text-on-surface-variant truncate"}">${conv.preview}</p>
                </div>
                ${conv.unread > 0 ? `<div class="bg-primary text-on-primary text-[10px] font-bold h-5 min-w-[20px] px-1 rounded-full flex items-center justify-center">${conv.unread}</div>` : ""}
            </div>
        `,
          )
          .join("");

        // attach click listeners
        document.querySelectorAll("[data-chat-id]").forEach((el) => {
          el.addEventListener("click", (e) => {
            const id = parseInt(el.dataset.chatId);
            if (!isNaN(id) && id !== activeChatId) {
              activeChatId = id;
              // reset unread
              const conv = conversations.find((c) => c.id === activeChatId);
              if (conv) conv.unread = 0;
              currentMessages = [...conv.messages];
              persistState();
              renderChatList();
              renderMessages();
              updateChatHeader();
            }
          });
        });
      }

      function updateChatHeader() {
        const conv = conversations.find((c) => c.id === activeChatId);
        if (conv) {
          document.getElementById("chatName").innerText = conv.name;
          document.getElementById("chatStatus").innerText = conv.status;
          document.getElementById("headerAvatar").src = conv.avatar;
        } else if (conversations.length) {
          activeChatId = conversations[0].id;
          currentMessages = [...conversations[0].messages];
          persistState();
          updateChatHeader();
        }
      }

      function formatTimeLabel(date) {
        return date.toLocaleTimeString("vi-VN", {
          hour: "2-digit",
          minute: "2-digit",
        });
      }

      function addNewMessage(text, sender = "me") {
        if (!text.trim()) return false;
        const newMsg = {
          id: Date.now(),
          sender: sender,
          text: text,
          time: formatTimeLabel(new Date()),
          type: "text",
        };
        currentMessages.push(newMsg);
        // update conversation preview and last message
        const conv = conversations.find((c) => c.id === activeChatId);
        if (conv) {
          conv.preview =
            text.length > 30 ? text.substring(0, 27) + "..." : text;
          conv.lastActive = "Vừa xong";
          conv.unread = sender === "them" ? 0 : conv.unread || 0;
          // update messages array inside conversation for persistence
          conv.messages = [...currentMessages];

          const convIndex = conversations.findIndex((c) => c.id === activeChatId);
          if (convIndex > 0) {
            conversations.splice(convIndex, 1);
            conversations.unshift(conv);
          }
        }
        persistState();
        renderMessages();
        renderChatList(); // update sidebar preview & unread
        return true;
      }

      function simulateReply() {
        // auto reply after 1.5 sec if last message is from me
        const lastMsg = currentMessages[currentMessages.length - 1];
        if (lastMsg && lastMsg.sender === "me") {
          setTimeout(() => {
            const replies = [
              "Chà, tuyệt vời! 😍",
              "Cảm ơn bạn, mình sẽ cập nhật ngay.",
              "Thú vị đấy, nói thêm đi!",
              "Mình đồng ý với bạn!",
            ];
            const randomReply =
              replies[Math.floor(Math.random() * replies.length)];
            addNewMessage(randomReply, "them");
            scrollToBottom();
          }, 1500);
        }
      }

      function renderMessages() {
        const container = document.getElementById("messagesContainer");
        if (!container) return;
        const todayLabel = `<div class="flex justify-center"><span class="px-3 py-1 bg-white/5 rounded-full text-[10px] font-medium text-on-surface-variant uppercase tracking-widest">Hôm nay</span></div>`;
        let messagesHtml = todayLabel;

        currentMessages.forEach((msg) => {
          if (msg.sender === "them") {
            messagesHtml += `
                    <div class="flex items-start gap-3 max-w-[80%] message-in">
                        <img class="w-8 h-8 rounded-full border border-white/10 mt-1 object-cover" src="${conversations.find((c) => c.id === activeChatId).avatar}" alt="avatar">
                        <div class="space-y-1">
                            <div class="px-4 py-3 glass-panel rounded-2xl rounded-tl-none shadow-sm">
                                ${
                                  msg.type === "voice"
                                    ? `
                                    <div class="flex items-center gap-4 min-w-[240px]">
                                        <button class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-on-primary play-audio-demo">
                                            <span class="material-symbols-outlined text-xl" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                                        </button>
                                        <div class="flex-1 flex items-center gap-1 h-8">
                                            <div class="w-1 h-3 bg-primary/40 rounded-full"></div><div class="w-1 h-5 bg-primary rounded-full"></div><div class="w-1 h-7 bg-primary rounded-full"></div><div class="w-1 h-4 bg-primary rounded-full"></div><div class="w-1 h-6 bg-primary rounded-full"></div><div class="w-1 h-8 bg-primary rounded-full"></div><div class="w-1 h-5 bg-primary/40 rounded-full"></div><div class="w-1 h-3 bg-primary/40 rounded-full"></div>
                                        </div>
                                        <span class="text-xs font-medium text-primary">${msg.duration || "0:12"}</span>
                                    </div>
                                `
                                    : `<p class="text-sm leading-relaxed">${msg.text}</p>`
                                }
                            </div>
                            <span class="text-[10px] text-on-surface-variant ml-1">${msg.time}</span>
                        </div>
                    </div>
                `;
          } else {
            messagesHtml += `
                    <div class="flex flex-row-reverse items-start gap-3 max-w-[80%] ml-auto message-in">
                        <div class="space-y-1 flex flex-col items-end">
                            <div class="px-4 py-3 bg-primary/20 backdrop-blur-xl border border-primary/30 rounded-2xl rounded-tr-none shadow-[0_4px_20px_rgba(125,211,252,0.1)]">
                                <p class="text-sm leading-relaxed text-on-background">${msg.text}</p>
                            </div>
                            <div class="flex items-center gap-1.5 mt-1 mr-1">
                                <span class="text-[10px] text-on-surface-variant">${msg.time}</span>
                                <span class="material-symbols-outlined text-[12px] text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            </div>
                        </div>
                    </div>
                `;
          }
        });

        // if last message is from me, show typing indicator from them after a moment
        container.innerHTML = messagesHtml;
        scrollToBottom();
        // after render, if last message is from me and not already typing, trigger reply simulation but only if not already waiting.
        // simple debounce flag to avoid double
        if (window._typingTimeout) clearTimeout(window._typingTimeout);
        const last = currentMessages[currentMessages.length - 1];
        if (last && last.sender === "me") {
          window._typingTimeout = setTimeout(() => {
            const typingHtml = document.createElement("div");
            typingHtml.className =
              "flex items-start gap-3 message-in typing-indicator-wrapper";
            typingHtml.innerHTML = `
                    <img class="w-8 h-8 rounded-full border border-white/10 object-cover" src="${conversations.find((c) => c.id === activeChatId).avatar}" alt="typing">
                    <div class="px-4 py-3 glass-panel rounded-2xl rounded-tl-none flex gap-1 typing-indicator">
                        <div class="w-1.5 h-1.5 bg-primary/60 rounded-full"></div>
                        <div class="w-1.5 h-1.5 bg-primary/60 rounded-full"></div>
                        <div class="w-1.5 h-1.5 bg-primary/60 rounded-full"></div>
                    </div>
                `;
            const containerDiv = document.getElementById("messagesContainer");
            if (
              containerDiv &&
              !containerDiv.querySelector(".typing-indicator-wrapper")
            ) {
              containerDiv.appendChild(typingHtml);
              scrollToBottom();
              // remove after 2 secs and call simulate reply
              setTimeout(() => {
                const typingEl = document.querySelector(
                  ".typing-indicator-wrapper",
                );
                if (typingEl) typingEl.remove();
                simulateReply();
              }, 2000);
            } else {
              simulateReply();
            }
          }, 800);
        }
      }

      function scrollToBottom() {
        const container = document.getElementById("messagesContainer");
        if (container)
          setTimeout(() => {
            container.scrollTop = container.scrollHeight;
          }, 30);
      }

      function sendMessageHandler() {
        const input = document.getElementById("messageInput");
        const text = input.value.trim();
        if (text === "") return;
        addNewMessage(text, "me");
        input.value = "";
        input.style.height = "auto";
        scrollToBottom();
        renderChatList();
      }

      // Auto-resize textarea
      const textarea = document.getElementById("messageInput");
      if (textarea) {
        textarea.addEventListener("input", function () {
          this.style.height = "auto";
          this.style.height = Math.min(100, this.scrollHeight) + "px";
        });
        textarea.addEventListener("keydown", (e) => {
          if (e.key === "Enter" && !e.shiftKey) {
            e.preventDefault();
            sendMessageHandler();
          }
        });
      }

      document
        .getElementById("sendButton")
        ?.addEventListener("click", sendMessageHandler);
      document
        .getElementById("addFriendButton")
        ?.addEventListener("click", openAddFriendModal);
      document
        .getElementById("closeAddFriendModal")
        ?.addEventListener("click", closeAddFriendModal);
      document
        .getElementById("cancelAddFriendButton")
        ?.addEventListener("click", closeAddFriendModal);
      document
        .getElementById("addFriendModal")
        ?.addEventListener("click", (e) => {
          if (e.target.id === "addFriendModal") {
            closeAddFriendModal();
          }
        });
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
          closeAddFriendModal();
        }
      });
      document.getElementById("addFriendForm")?.addEventListener("submit", (e) => {
        e.preventDefault();
        createConversation(
          document.getElementById("friendNameInput")?.value || "",
          document.getElementById("friendStatusInput")?.value || "",
          document.getElementById("friendAvatarInput")?.value || "",
        );
      });
      document.getElementById("micButton")?.addEventListener("click", () => {
        alert(
          "Tính năng ghi âm đang phát triển. Hãy gửi tin nhắn văn bản nhé!",
        );
      });

      document
        .getElementById("searchInput")
        ?.addEventListener("input", () => renderChatList());

      // init
      renderChatList();
      renderMessages();
      updateChatHeader();
    </script>
  </body>
</html>
