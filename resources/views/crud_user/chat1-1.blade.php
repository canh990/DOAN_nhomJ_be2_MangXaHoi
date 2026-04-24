<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Chat 1-1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body {
        background:
          radial-gradient(circle at top left, rgba(16, 185, 129, 0.18), transparent 24%),
          linear-gradient(135deg, #041316, #0f172a 50%, #0b1220);
      }

      .panel {
        background: rgba(15, 23, 42, 0.82);
        backdrop-filter: blur(18px);
        border: 1px solid rgba(148, 163, 184, 0.12);
      }

      .soft-card {
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(2, 6, 23, 0.45);
      }
    </style>
  </head>
  <body class="min-h-screen text-slate-100">
    <main class="mx-auto flex h-screen max-w-7xl gap-4 p-4">
      <aside class="panel flex w-full max-w-sm flex-col rounded-3xl">
        <div class="border-b border-white/10 p-5">
          <div class="mb-4 flex items-center justify-between">
            <div>
              <p class="text-xs uppercase tracking-[0.3em] text-emerald-300/80">Feature</p>
              <h1 class="text-2xl font-semibold">Chat 1-1</h1>
              <p class="mt-2 text-sm text-slate-400">Tinh nang nhan tin rieng tuong dong visual voi man status.</p>
            </div>
            <button
              class="rounded-full bg-emerald-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:brightness-110"
              id="addFriendButton"
              type="button"
            >
              Them ban
            </button>
          </div>
          <input
            class="w-full rounded-2xl border border-white/10 bg-slate-900/70 px-4 py-3 text-sm outline-none"
            id="searchInput"
            placeholder="Tim cuoc tro chuyen..."
            type="text"
          />
        </div>
        <div class="border-b border-white/10 px-5 py-4">
          <div class="grid grid-cols-2 gap-3">
            <div class="soft-card rounded-2xl p-4">
              <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Hoi thoai</p>
              <p class="mt-2 text-2xl font-semibold" id="conversationCount">0</p>
            </div>
            <div class="soft-card rounded-2xl p-4">
              <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Chua doc</p>
              <p class="mt-2 text-2xl font-semibold text-emerald-300" id="unreadCount">0</p>
            </div>
          </div>
        </div>
        <div class="flex-1 space-y-2 overflow-y-auto p-3" id="chatListContainer"></div>
      </aside>

      <section class="panel flex min-w-0 flex-1 flex-col rounded-3xl">
        <header class="flex items-center gap-4 border-b border-white/10 p-5">
          <div class="relative">
            <img
              alt="Avatar"
              class="h-14 w-14 rounded-full object-cover"
              id="headerAvatar"
              src="https://ui-avatars.com/api/?name=Chat&background=0f172a&color=7dd3fc"
            />
            <span class="absolute bottom-0 right-0 h-4 w-4 rounded-full border-2 border-slate-900 bg-emerald-400"></span>
          </div>
          <div class="min-w-0">
            <h2 class="truncate text-xl font-semibold" id="chatName">Chon mot cuoc tro chuyen</h2>
            <p class="truncate text-sm text-slate-400" id="chatMeta">San sang tro chuyen</p>
          </div>
          <div class="ml-auto hidden gap-3 md:flex">
            <div class="soft-card rounded-2xl px-4 py-3">
              <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Loai</p>
              <p class="mt-1 text-sm font-semibold">1-1 Chat</p>
            </div>
            <div class="soft-card rounded-2xl px-4 py-3">
              <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Trang thai</p>
              <p class="mt-1 text-sm font-semibold text-emerald-300">Dang mo</p>
            </div>
          </div>
        </header>

        <div class="grid flex-1 gap-4 p-5 md:grid-cols-[1.2fr_0.8fr]">
          <div class="rounded-3xl border border-white/10 bg-slate-900/50 p-5">
            <div class="mb-4 flex items-center justify-between">
              <div>
                <h3 class="text-lg font-semibold">Noi dung tro chuyen</h3>
                <p class="mt-1 text-sm text-slate-400">Khung chat chinh voi danh sach tin nhan 1-1.</p>
              </div>
              <span class="rounded-full border border-emerald-400/30 bg-emerald-400/10 px-3 py-1 text-xs font-medium text-emerald-300">Live UI</span>
            </div>
            <div class="flex-1 space-y-4 overflow-y-auto" id="messagesContainer"></div>
          </div>

          <aside class="rounded-3xl border border-white/10 bg-slate-900/50 p-5">
            <h3 class="text-lg font-semibold">Thong tin nhanh</h3>
            <div class="mt-4 space-y-4" id="chatSummaryPanel"></div>
          </aside>
        </div>

        <footer class="border-t border-white/10 p-4">
          <div class="flex items-end gap-3">
            <textarea
              class="max-h-32 min-h-[52px] flex-1 resize-none rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-sm outline-none"
              id="messageInput"
              placeholder="Nhap tin nhan..."
              rows="1"
            ></textarea>
            <button
              class="rounded-2xl bg-emerald-400 px-5 py-3 font-semibold text-slate-950 transition hover:brightness-110"
              id="sendButton"
              type="button"
            >
              Gui
            </button>
          </div>
        </footer>
      </section>
    </main>

    <div class="fixed inset-0 hidden items-center justify-center bg-slate-950/60 p-4" id="addFriendModal">
      <div class="panel w-full max-w-md rounded-3xl p-6">
        <div class="mb-5 flex items-start justify-between gap-4">
          <div>
            <h3 class="text-xl font-semibold">Them cuoc tro chuyen</h3>
            <p class="mt-1 text-sm text-slate-400">Tao nhanh mot chat 1-1 moi.</p>
          </div>
          <button
            class="rounded-full border border-white/10 px-3 py-1 text-sm text-slate-300"
            id="closeAddFriendModal"
            type="button"
          >
            Dong
          </button>
        </div>

        <form class="space-y-4" id="addFriendForm">
          <input
            class="w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-sm outline-none"
            id="friendNameInput"
            placeholder="Ten ban"
            required
            type="text"
          />
          <input
            class="w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-sm outline-none"
            id="friendAvatarInput"
            placeholder="Avatar URL"
            type="url"
          />
          <div class="flex justify-end gap-3 pt-2">
            <button
              class="rounded-2xl border border-white/10 px-4 py-2 text-sm text-slate-300"
              id="cancelAddFriendButton"
              type="button"
            >
              Huy
            </button>
            <button class="rounded-2xl bg-emerald-400 px-4 py-2 text-sm font-semibold text-slate-950" type="submit">
              Tao
            </button>
          </div>
        </form>
      </div>
    </div>

    <script>
      const defaultAvatar = "https://ui-avatars.com/api/?name=New+Friend&background=0f172a&color=7dd3fc";
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
      const chatRoutes = @json($chatRoutes);
      const initialConversations = @json($initialConversations);
      const autoReplyTimers = new Map();

      let conversations = Array.isArray(initialConversations) ? initialConversations : [];
      let activeChatId = conversations[0]?.id ?? null;
      let currentMessages = conversations.find((conversation) => conversation.id === activeChatId)?.messages ?? [];

      function activeConversation() {
        return conversations.find((conversation) => conversation.id === activeChatId);
      }

      function syncCurrentMessages() {
        currentMessages = activeConversation()?.messages ?? [];
      }

      async function requestJson(url, options = {}) {
        const response = await fetch(url, {
          headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
            ...(options.headers || {}),
          },
          credentials: "same-origin",
          ...options,
        });

        const payload = await response.json().catch(() => ({}));

        if (!response.ok) {
          const message = payload.message || Object.values(payload.errors || {}).flat().join("\n") || "Khong the xu ly yeu cau.";
          throw new Error(message);
        }

        return payload;
      }

      function renderChatList() {
        const container = document.getElementById("chatListContainer");
        const query = document.getElementById("searchInput")?.value.toLowerCase().trim() || "";
        const filtered = conversations.filter((conversation) => conversation.name.toLowerCase().includes(query));
        const unreadTotal = conversations.reduce((total, conversation) => total + (conversation.unread || 0), 0);

        document.getElementById("conversationCount").textContent = conversations.length;
        document.getElementById("unreadCount").textContent = unreadTotal;

        container.innerHTML = filtered.length
          ? filtered
              .map(
                (conversation) => `
                  <button class="flex w-full items-center gap-3 rounded-2xl border px-3 py-3 text-left transition ${conversation.id === activeChatId ? "border-emerald-400/40 bg-emerald-400/10" : "border-transparent hover:border-white/10 hover:bg-white/5"}" data-chat-id="${conversation.id}" type="button">
                    <div class="relative">
                      <img class="h-12 w-12 rounded-full object-cover" src="${conversation.avatar || defaultAvatar}" alt="${conversation.name}">
                      <span class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-slate-900 bg-emerald-400"></span>
                    </div>
                    <div class="min-w-0 flex-1">
                      <div class="flex items-center justify-between gap-3">
                        <p class="truncate font-medium">${conversation.name}</p>
                        <span class="text-xs text-slate-400">${conversation.lastActive || ""}</span>
                      </div>
                      <p class="truncate text-sm text-slate-400">${conversation.preview || ""}</p>
                    </div>
                    ${conversation.unread > 0 ? `<span class="rounded-full bg-emerald-400 px-2 py-1 text-xs font-semibold text-slate-950">${conversation.unread}</span>` : ""}
                  </button>
                `,
              )
              .join("")
          : '<div class="rounded-2xl border border-dashed border-white/10 p-5 text-center text-sm text-slate-400">Khong tim thay cuoc tro chuyen.</div>';

        document.querySelectorAll("[data-chat-id]").forEach((element) => {
          element.addEventListener("click", () => {
            const id = Number.parseInt(element.dataset.chatId, 10);
            if (Number.isNaN(id)) return;
            activeChatId = id;
            syncCurrentMessages();
            renderAll();
          });
        });
      }

      function renderHeader() {
        const conversation = activeConversation();
        document.getElementById("chatName").textContent = conversation?.name || "Chon mot cuoc tro chuyen";
        document.getElementById("chatMeta").textContent = conversation?.lastActive ? `Hoat dong ${conversation.lastActive}` : "San sang tro chuyen";
        document.getElementById("headerAvatar").src = conversation?.avatar || defaultAvatar;
      }

      function renderMessages() {
        const container = document.getElementById("messagesContainer");
        const conversation = activeConversation();

        if (!conversation) {
          container.innerHTML = '<div class="flex h-full items-center justify-center text-sm text-slate-400">Chua co cuoc tro chuyen nao.</div>';
          return;
        }

        container.innerHTML = currentMessages.length
          ? currentMessages
              .map((message) =>
                message.sender === "them"
                  ? `
                    <div class="flex items-end gap-3">
                      <img class="h-9 w-9 rounded-full object-cover" src="${conversation.avatar || defaultAvatar}" alt="avatar">
                      <div>
                        <div class="max-w-xl rounded-2xl rounded-bl-md border border-white/10 bg-slate-950/70 px-4 py-3 text-sm text-slate-100">${message.text || ""}</div>
                        <p class="mt-1 text-xs text-slate-500">${message.time || ""}</p>
                      </div>
                    </div>
                  `
                  : `
                    <div class="flex justify-end">
                      <div>
                        <div class="max-w-xl rounded-2xl rounded-br-md bg-emerald-400 px-4 py-3 text-sm text-slate-950">${message.text || ""}</div>
                        <p class="mt-1 text-right text-xs text-slate-500">${message.time || ""}</p>
                      </div>
                    </div>
                  `,
              )
              .join("")
          : '<div class="flex h-full items-center justify-center text-sm text-slate-400">Hay gui loi chao dau tien.</div>';

        container.scrollTop = container.scrollHeight;
      }

      function renderSummaryPanel() {
        const conversation = activeConversation();
        const totalMessages = currentMessages.length;
        const fromMe = currentMessages.filter((message) => message.sender === "me").length;
        const fromThem = currentMessages.filter((message) => message.sender === "them").length;

        document.getElementById("chatSummaryPanel").innerHTML = conversation
          ? `
              <div class="soft-card rounded-2xl p-4">
                <p class="text-sm text-slate-400">Nguoi dang chat</p>
                <p class="mt-2 text-lg font-semibold">${conversation.name}</p>
              </div>
              <div class="soft-card rounded-2xl p-4">
                <p class="text-sm text-slate-400">Tong so tin nhan</p>
                <p class="mt-2 text-3xl font-semibold text-emerald-300">${totalMessages}</p>
              </div>
              <div class="grid grid-cols-2 gap-3">
                <div class="soft-card rounded-2xl p-4">
                  <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Ban gui</p>
                  <p class="mt-2 text-2xl font-semibold">${fromMe}</p>
                </div>
                <div class="soft-card rounded-2xl p-4">
                  <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Ban nhan</p>
                  <p class="mt-2 text-2xl font-semibold">${fromThem}</p>
                </div>
              </div>
              <div class="soft-card rounded-2xl p-4">
                <p class="text-sm text-slate-400">Preview hien tai</p>
                <p class="mt-2 text-sm leading-6 text-slate-200">${conversation.preview || "Chua co preview"}</p>
              </div>
            `
          : `
              <div class="soft-card rounded-2xl p-4 text-sm text-slate-400">
                Chon mot cuoc tro chuyen de xem thong tin nhanh.
              </div>
            `;
      }

      function renderAll() {
        renderChatList();
        renderHeader();
        renderMessages();
        renderSummaryPanel();
      }

      async function pushMessage(text, sender = "me") {
        if (!activeChatId || !text.trim()) return;

        const endpoint = chatRoutes.storeMessage.replace("__ID__", activeChatId);
        const payload = await requestJson(endpoint, {
          method: "POST",
          body: JSON.stringify({ text: text.trim(), sender }),
        });

        conversations = Array.isArray(payload.conversations) ? payload.conversations : conversations;
        syncCurrentMessages();
        renderAll();
      }

      function scheduleAutoReply(conversationId) {
        if (!conversationId || autoReplyTimers.has(conversationId)) return;

        const timeoutId = window.setTimeout(async () => {
          autoReplyTimers.delete(conversationId);
          const replies = [
            "Ok nha, de minh xem them.",
            "Minh nhan duoc roi.",
            "Hop ly do, de minh cap nhat.",
          ];

          const reply = replies[Math.floor(Math.random() * replies.length)];
          const previousActiveChatId = activeChatId;

          try {
            activeChatId = conversationId;
            await pushMessage(reply, "them");
          } finally {
            activeChatId = previousActiveChatId;
            syncCurrentMessages();
            renderAll();
          }
        }, 1500);

        autoReplyTimers.set(conversationId, timeoutId);
      }

      async function sendMessageHandler() {
        const input = document.getElementById("messageInput");
        const text = input?.value.trim() || "";
        if (!text) return;

        try {
          await pushMessage(text, "me");
          input.value = "";
          input.style.height = "52px";
          scheduleAutoReply(activeChatId);
        } catch (error) {
          alert(error.message);
        }
      }

      async function createConversation(name, avatar) {
        const payload = await requestJson(chatRoutes.storeConversation, {
          method: "POST",
          body: JSON.stringify({
            name: name.trim(),
            avatar: avatar.trim(),
          }),
        });

        const existingIndex = conversations.findIndex((conversation) => conversation.id === payload.id);
        if (existingIndex >= 0) {
          conversations.splice(existingIndex, 1);
        }

        conversations.unshift(payload);
        activeChatId = payload.id;
        syncCurrentMessages();
        renderAll();
        closeAddFriendModal();
      }

      function openAddFriendModal() {
        document.getElementById("addFriendModal")?.classList.remove("hidden");
        document.getElementById("addFriendModal")?.classList.add("flex");
      }

      function closeAddFriendModal() {
        document.getElementById("addFriendModal")?.classList.add("hidden");
        document.getElementById("addFriendModal")?.classList.remove("flex");
        document.getElementById("addFriendForm")?.reset();
      }

      const textarea = document.getElementById("messageInput");
      textarea?.addEventListener("input", function () {
        this.style.height = "auto";
        this.style.height = `${Math.min(this.scrollHeight, 128)}px`;
      });
      textarea?.addEventListener("keydown", (event) => {
        if (event.key === "Enter" && !event.shiftKey) {
          event.preventDefault();
          sendMessageHandler();
        }
      });

      document.getElementById("sendButton")?.addEventListener("click", sendMessageHandler);
      document.getElementById("addFriendButton")?.addEventListener("click", openAddFriendModal);
      document.getElementById("closeAddFriendModal")?.addEventListener("click", closeAddFriendModal);
      document.getElementById("cancelAddFriendButton")?.addEventListener("click", closeAddFriendModal);
      document.getElementById("searchInput")?.addEventListener("input", renderChatList);
      document.getElementById("addFriendModal")?.addEventListener("click", (event) => {
        if (event.target.id === "addFriendModal") {
          closeAddFriendModal();
        }
      });
      document.getElementById("addFriendForm")?.addEventListener("submit", async (event) => {
        event.preventDefault();

        try {
          await createConversation(
            document.getElementById("friendNameInput")?.value || "",
            document.getElementById("friendAvatarInput")?.value || "",
          );
        } catch (error) {
          alert(error.message);
        }
      });

      renderAll();
    </script>
  </body>
</html>
