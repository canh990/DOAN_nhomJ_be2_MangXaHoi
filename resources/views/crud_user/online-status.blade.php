<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Online Status</title>
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
    </style>
  </head>
  <body class="min-h-screen text-slate-100">
    <main class="mx-auto flex min-h-screen max-w-7xl gap-4 p-4">
      <section class="panel flex w-full max-w-sm flex-col rounded-3xl">
        <div class="border-b border-white/10 p-5">
          <p class="text-xs uppercase tracking-[0.3em] text-emerald-300/80">Feature</p>
          <h1 class="mt-1 text-2xl font-semibold">Online / Offline Status</h1>
 
        </div>
        <div class="flex-1 space-y-2 overflow-y-auto p-3" id="contactListContainer"></div>
      </section>

      <section class="panel flex min-w-0 flex-1 flex-col rounded-3xl">
        <header class="flex items-center gap-4 border-b border-white/10 p-5">
          <div class="relative">
            <img
              alt="Avatar"
              class="h-14 w-14 rounded-full object-cover"
              id="detailAvatar"
              src="https://ui-avatars.com/api/?name=Status&background=0f172a&color=7dd3fc"
            />
            <span class="absolute bottom-0 right-0 h-4 w-4 rounded-full border-2 border-slate-900" id="detailDot"></span>
          </div>
          <div class="min-w-0">
            <h2 class="truncate text-xl font-semibold" id="detailName">Chọn một người dùng</h2>
            <p class="truncate text-sm text-slate-400" id="detailLastSeen">Chưa có dữ liệu</p>
          </div>
        </header>

        <div class="grid flex-1 gap-4 p-5 md:grid-cols-[1.2fr_0.8fr]">
          <div class="rounded-3xl border border-white/10 bg-slate-900/50 p-5">
            <h3 class="text-lg font-semibold">Cập nhật trạng thái</h3>
         
            <label class="mt-6 block text-xs uppercase tracking-[0.25em] text-slate-400">
              Ghi chú trạng thái
            </label>
            <input
              class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/70 px-4 py-3 text-sm outline-none"
              id="statusNoteInput"
              placeholder="Vi du: Dang online"
              type="text"
            />

            <div class="mt-5 grid grid-cols-2 gap-3">
              <button
                class="rounded-2xl bg-emerald-400 px-4 py-3 text-sm font-semibold text-slate-950"
                id="setOnlineButton"
                type="button"
              >
                Đang online
              </button>
              <button
                class="rounded-2xl bg-slate-700 px-4 py-3 text-sm font-semibold text-white"
                id="setOfflineButton"
                type="button"
              >
                Đang offline
              </button>
            </div>
          </div>

          <div class="rounded-3xl border border-white/10 bg-slate-900/50 p-5">
            <h3 class="text-lg font-semibold">Thống kê nhanh</h3>
            <div class="mt-4 space-y-4" id="summaryContainer"></div>
          </div>
        </div>
      </section>
    </main>

    <script>
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
      const statusRoutes = @json($statusRoutes);
      const initialContacts = @json($initialContacts);

      let contacts = Array.isArray(initialContacts) ? initialContacts : [];
      let activeContactId = contacts[0]?.id ?? null;

      function activeContact() {
        return contacts.find((contact) => contact.id === activeContactId);
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
          throw new Error(payload.message || "Khong the cap nhat trang thai.");
        }

        return payload;
      }

      function renderContacts() {
        const container = document.getElementById("contactListContainer");
        container.innerHTML = contacts
          .map(
            (contact) => `
              <button class="flex w-full items-center gap-3 rounded-2xl border px-3 py-3 text-left transition ${contact.id === activeContactId ? "border-emerald-400/40 bg-emerald-400/10" : "border-transparent hover:border-white/10 hover:bg-white/5"}" data-contact-id="${contact.id}" type="button">
                <div class="relative">
                  <img class="h-12 w-12 rounded-full object-cover" src="${contact.avatar}" alt="${contact.name}">
                  <span class="absolute bottom-0 right-0 h-3.5 w-3.5 rounded-full border-2 border-slate-900 ${contact.is_online ? "bg-emerald-400" : "bg-slate-500"}"></span>
                </div>
                <div class="min-w-0 flex-1">
                  <p class="truncate font-medium">${contact.name}</p>
                  <p class="truncate text-sm ${contact.is_online ? "text-emerald-300" : "text-slate-400"}">${contact.note}</p>
                </div>
              </button>
            `,
          )
          .join("");

        document.querySelectorAll("[data-contact-id]").forEach((element) => {
          element.addEventListener("click", () => {
            const id = Number.parseInt(element.dataset.contactId, 10);
            if (Number.isNaN(id)) return;
            activeContactId = id;
            renderAll();
          });
        });
      }

      function renderDetail() {
        const contact = activeContact();
        document.getElementById("detailName").textContent = contact?.name || "Chon mot nguoi dung";
        document.getElementById("detailLastSeen").textContent = contact?.last_seen || "Chua co du lieu";
        document.getElementById("detailAvatar").src = contact?.avatar || "";
        document.getElementById("statusNoteInput").value = contact?.note || "";
        document.getElementById("detailDot").className =
          `absolute bottom-0 right-0 h-4 w-4 rounded-full border-2 border-slate-900 ${contact?.is_online ? "bg-emerald-400" : "bg-slate-500"}`;
      }

      function renderSummary() {
        const onlineCount = contacts.filter((contact) => contact.is_online).length;
        const active = activeContact();

        document.getElementById("summaryContainer").innerHTML = `
          <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
            <p class="text-sm text-slate-400">So nguoi dang online</p>
            <p class="mt-2 text-3xl font-semibold text-emerald-300">${onlineCount}</p>
          </div>
          <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
            <p class="text-sm text-slate-400">So nguoi dang offline</p>
            <p class="mt-2 text-3xl font-semibold text-slate-200">${contacts.length - onlineCount}</p>
          </div>
          <div class="rounded-2xl border border-white/10 bg-slate-950/60 p-4">
            <p class="text-sm text-slate-400">Trang thai hien tai</p>
            <p class="mt-2 text-lg font-semibold ${active?.is_online ? "text-emerald-300" : "text-slate-200"}">${active?.note || "Chua chon"}</p>
          </div>
        `;
      }

      function renderAll() {
        renderContacts();
        renderDetail();
        renderSummary();
      }

      async function updateStatus(isOnline) {
        const contact = activeContact();
        if (!contact) return;

        const endpoint = statusRoutes.update.replace("__ID__", contact.id);
        const payload = await requestJson(endpoint, {
          method: "PATCH",
          body: JSON.stringify({
            is_online: isOnline,
            note: document.getElementById("statusNoteInput")?.value.trim() || "",
          }),
        });

        contacts = Array.isArray(payload.contacts) ? payload.contacts : contacts;
        renderAll();
      }

      document.getElementById("setOnlineButton")?.addEventListener("click", async () => {
        try {
          await updateStatus(true);
        } catch (error) {
          alert(error.message);
        }
      });

      document.getElementById("setOfflineButton")?.addEventListener("click", async () => {
        try {
          await updateStatus(false);
        } catch (error) {
          alert(error.message);
        }
      });

      renderAll();
    </script>
  </body>
</html>
