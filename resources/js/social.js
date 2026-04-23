/**
 * nhomj-social.js  v2.0
 * Reaction & Comment cho NHOMJ Social Network
 * Vanilla JS + Fetch API — không cần framework
 */

const NJ = (() => {
    // ── Helpers ───────────────────────────────────────────────
    const csrf  = () => document.querySelector('meta[name="csrf-token"]')?.content ?? '';
    const myId  = () => parseInt(document.body.dataset.userId ?? 0);
    const EMOJI = { thich:'👍', tim:'❤️', haha:'😆', wow:'😮', buon:'😢', phan_no:'😡' };
    const LABEL = { thich:'Thích', tim:'Yêu thích', haha:'Haha', wow:'Wow', buon:'Buồn', phan_no:'Phẫn nộ' };
    const COLOR = { thich:'#4f98ff', tim:'#f93a5a', haha:'#f4b400', wow:'#f4b400', buon:'#f4b400', phan_no:'#e05c2a' };

    async function api(url, opts = {}) {
        const res = await fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf(),
                'Accept':       'application/json',
                ...opts.headers,
            },
            ...opts,
        });
        if (!res.ok) throw new Error(`API ${url} lỗi ${res.status}`);
        return res.json();
    }

    function thoiGian(iso) {
        const diff = (Date.now() - new Date(iso)) / 1000;
        if (diff < 60)    return 'Vừa xong';
        if (diff < 3600)  return `${Math.floor(diff / 60)} phút trước`;
        if (diff < 86400) return `${Math.floor(diff / 3600)} giờ trước`;
        return `${Math.floor(diff / 86400)} ngày trước`;
    }

    // ════════════════════════════════════════════════════════
    // REACTION
    // ════════════════════════════════════════════════════════

    /** Nhấn nút Thích (toggle thich) */
    function nhanThich(btn) {
        const wrap       = btn.closest('.nj-btn-wrap');
        const baiVietId  = wrap.dataset.baiVietId;
        const loaiCu     = wrap.closest('.nj-reaction-bar').dataset.phanUng;
        const loaiGui    = 'thich'; // click đơn luôn là 'thich'
        _toggleBaiViet(baiVietId, loaiGui);
    }

    /** Chọn emoji từ picker */
    function chonCamXuc(btn, loai) {
        const baiVietId = btn.closest('.nj-btn-wrap').dataset.baiVietId;
        _toggleBaiViet(baiVietId, loai);
        btn.closest('.nj-picker').classList.remove('show');
    }

    async function _toggleBaiViet(baiVietId, loai) {
        try {
            const data = await api(`/api/bai-viet/${baiVietId}/reaction`, {
                method: 'POST',
                body: JSON.stringify({ loai_cam_xuc: loai }),
            });
            _capNhatUIBaiViet(baiVietId, data);
        } catch (e) { console.error(e); }
    }

    function _capNhatUIBaiViet(baiVietId, data) {
        const bar = document.querySelector(`.nj-reaction-bar[data-bai-viet-id="${baiVietId}"]`);
        if (!bar) return;

        const loai = data.phan_ung_hien_tai;
        bar.dataset.phanUng = loai ?? '';

        // Nút chính
        const btn = bar.querySelector('.nj-btn-main');
        btn.querySelector('.nj-icon').textContent  = loai ? EMOJI[loai] : '👍';
        btn.querySelector('.nj-label').textContent = loai ? LABEL[loai] : 'Thích';
        btn.style.color = loai ? COLOR[loai] : '';
        btn.classList.toggle('active', !!loai);

        // Picker active
        bar.querySelectorAll('.nj-picker-item').forEach(item => {
            item.classList.toggle('active', item.dataset.loai === loai);
        });

        // Tổng số
        const countEl = bar.querySelector('.nj-reaction-count');
        if (countEl) countEl.textContent = data.tong_so > 0 ? data.tong_so.toLocaleString('vi') : '';

        // Mini icons
        const miniEl = bar.querySelector('.nj-mini-icons');
        if (miniEl) {
            const sorted = Object.entries(data.tong_hop).sort((a, b) => b[1] - a[1]).slice(0, 3);
            miniEl.innerHTML = sorted.map(([l]) =>
                `<span title="${LABEL[l]}">${EMOJI[l]}</span>`).join('');
        }

        // Cập nhật summary button visibility
        const summary = bar.querySelector('.nj-reaction-summary');
        if (summary) summary.style.display = data.tong_so > 0 ? '' : 'none';
    }

    // Toggle reaction bình luận
    async function nhanThichBinhLuan(btn) {
        const item       = btn.closest('.nj-comment-item');
        const binhLuanId = item.dataset.id;
        const loaiCu     = item.dataset.phanUng ?? '';
        const loai       = 'thich'; // mặc định thich

        try {
            const data = await api(`/api/binh-luan/${binhLuanId}/reaction`, {
                method: 'POST',
                body: JSON.stringify({ loai_cam_xuc: loai }),
            });
            item.dataset.phanUng = data.phan_ung_hien_tai ?? '';
            const active = !!data.phan_ung_hien_tai;
            btn.classList.toggle('active', active);
            btn.textContent = active
                ? `${EMOJI[data.phan_ung_hien_tai]} ${data.tong_so || ''}`
                : 'Thích';
        } catch (e) { console.error(e); }
    }

    // Modal danh sách người react
    async function moModalReaction(baiVietId) {
        try {
            const data = await api(`/api/bai-viet/${baiVietId}/reactions`);
            let modal = document.getElementById('nj-modal-reactions');
            if (!modal) {
                modal = document.createElement('div');
                modal.id = 'nj-modal-reactions';
                modal.className = 'nj-modal-overlay';
                modal.innerHTML = `
                    <div class="nj-modal">
                        <div class="nj-modal-header">
                            <span>Cảm xúc</span>
                            <button onclick="this.closest('#nj-modal-reactions').remove()">✕</button>
                        </div>
                        <div class="nj-modal-body" id="nj-modal-list"></div>
                    </div>`;
                document.body.appendChild(modal);
                modal.addEventListener('click', e => {
                    if (e.target === modal) modal.remove();
                });
            }
            document.getElementById('nj-modal-list').innerHTML =
                (data.data ?? []).map(r => `
                    <div class="nj-modal-row">
                        <img src="${r.nguoi_dung?.anh_dai_dien ?? '/images/default-avatar.png'}"
                             class="nj-avatar sm" alt=""/>
                        <span>${r.nguoi_dung?.ten_dang_nhap ?? 'Ẩn danh'}</span>
                        <span class="nj-modal-emoji">${EMOJI[r.loai_cam_xuc] ?? '👍'}</span>
                    </div>`).join('');
        } catch (e) { console.error(e); }
    }

    // Hover picker
    function _initPickers() {
        document.querySelectorAll('.nj-btn-wrap').forEach(wrap => {
            let timer;
            wrap.addEventListener('mouseenter', () => {
                timer = setTimeout(() => wrap.querySelector('.nj-picker')?.classList.add('show'), 400);
            });
            wrap.addEventListener('mouseleave', () => {
                clearTimeout(timer);
                setTimeout(() => wrap.querySelector('.nj-picker')?.classList.remove('show'), 200);
            });
        });
    }

    // ════════════════════════════════════════════════════════
    // COMMENT
    // ════════════════════════════════════════════════════════

    const _trangBV = {}; // trang hiện tại của mỗi bài viết

    /** Tải danh sách bình luận */
    async function taiThem(baiVietId, trang) {
        trang = trang ?? ((_trangBV[baiVietId] ?? 0) + 1);
        try {
            const data = await api(`/api/bai-viet/${baiVietId}/binh-luan?page=${trang}`);
            _trangBV[baiVietId] = data.current_page;

            const list = document.getElementById(`nj-list-${baiVietId}`);
            if (trang === 1) list.innerHTML = '';
            (data.data ?? []).forEach(bl => list.appendChild(_renderBinhLuan(bl)));

            const btn = document.getElementById(`nj-loadmore-${baiVietId}`);
            if (btn) btn.style.display = data.next_page_url ? 'block' : 'none';
        } catch (e) { console.error(e); }
    }

    /** Đăng bình luận mới */
    async function guiBinhLuan(baiVietId) {
        const input   = document.getElementById(`nj-input-${baiVietId}`);
        const noidung = input.value.trim();
        if (!noidung) return;

        try {
            const bl = await api(`/api/bai-viet/${baiVietId}/binh-luan`, {
                method: 'POST',
                body: JSON.stringify({ noi_dung: noidung }),
            });
            input.value = '';
            autoResize(input);
            document.getElementById(`nj-list-${baiVietId}`)?.prepend(_renderBinhLuan(bl));
        } catch (e) { console.error(e); }
    }

    /** Gửi trả lời */
    async function guiTraLoi(btn) {
        const item       = btn.closest('.nj-comment-item');
        const binhLuanId = item.dataset.id;
        const baiVietId  = item.closest('.nj-comment-section').id.replace('nj-comments-', '');
        const input      = item.querySelector('.nj-reply-input');
        const noidung    = input.value.trim();
        if (!noidung) return;

        try {
            const tl = await api(`/api/bai-viet/${baiVietId}/binh-luan`, {
                method: 'POST',
                body: JSON.stringify({ noi_dung: noidung, binh_luan_cha_id: parseInt(binhLuanId) }),
            });
            input.value = '';
            item.querySelector('.nj-reply-list')?.appendChild(_renderBinhLuan(tl, true));
        } catch (e) { console.error(e); }
    }

    /** Xóa bình luận */
    async function xoaBinhLuan(btn) {
        if (!confirm('Xóa bình luận này?')) return;
        const item = btn.closest('.nj-comment-item');
        try {
            await api(`/api/binh-luan/${item.dataset.id}`, { method: 'DELETE' });
            const textEl = item.querySelector('.nj-text');
            textEl.textContent   = '[Bình luận đã bị xóa]';
            textEl.style.opacity = '0.4';
            textEl.style.fontStyle = 'italic';
            item.querySelector('.nj-btn-edit')?.remove();
            item.querySelector('.nj-btn-delete')?.remove();
        } catch (e) { console.error(e); }
    }

    /** Mở form sửa */
    function suaBinhLuan(btn) {
        const item   = btn.closest('.nj-comment-item');
        const textEl = item.querySelector('.nj-text');
        const old    = textEl.textContent;

        const ta = document.createElement('textarea');
        ta.className = 'nj-edit-input';
        ta.value = old;
        textEl.replaceWith(ta);
        ta.focus();

        btn.textContent = 'Lưu';
        btn.onclick = () => _luuSua(btn, item.dataset.id, ta);
    }

    async function _luuSua(btn, id, ta) {
        const noidung = ta.value.trim();
        if (!noidung) return;
        try {
            const bl = await api(`/api/binh-luan/${id}`, {
                method: 'PUT',
                body: JSON.stringify({ noi_dung: noidung }),
            });
            const p = document.createElement('p');
            p.className = 'nj-text';
            p.textContent = bl.noi_dung;
            ta.replaceWith(p);
            btn.textContent = 'Sửa';
            btn.onclick = () => suaBinhLuan(btn);
        } catch (e) { console.error(e); }
    }

    /** Mở/đóng form trả lời */
    function moTraLoi(btn) {
        const section = btn.closest('.nj-comment-item').querySelector('.nj-reply-section');
        const isOpen  = section.style.display !== 'none';
        section.style.display = isOpen ? 'none' : 'block';
        if (!isOpen) section.querySelector('.nj-reply-input')?.focus();
    }

    /** Tải thêm trả lời */
    async function taiThemTraLoi(btn) {
        const item       = btn.closest('.nj-comment-item');
        const binhLuanId = item.dataset.id;
        const trang      = parseInt(btn.dataset.trang ?? 1);
        try {
            const data = await api(`/api/binh-luan/${binhLuanId}/tra-loi?page=${trang}`);
            const list = item.querySelector('.nj-reply-list');
            (data.data ?? []).forEach(tl => list.appendChild(_renderBinhLuan(tl, true)));
            btn.dataset.trang = trang + 1;
            btn.style.display = data.next_page_url ? 'inline' : 'none';
        } catch (e) { console.error(e); }
    }

    // ── Render bình luận từ JSON ──────────────────────────
    function _renderBinhLuan(bl, isReply = false) {
        const tmpl  = document.getElementById('nj-tmpl-comment');
        const clone = tmpl.content.cloneNode(true);
        const el    = clone.querySelector('.nj-comment-item');

        el.dataset.id      = bl.id;
        el.dataset.phanUng = bl.phan_ung_cua_toi ?? '';
        if (isReply) el.classList.add('is-reply');

        const nd = bl.nguoi_dung ?? bl.nguoiDung;
        el.querySelector('.nj-avatar').src          = nd?.anh_dai_dien ?? '/images/default-avatar.png';
        el.querySelector('.nj-author').textContent  = nd?.ten_dang_nhap ?? 'Ẩn danh';
        el.querySelector('.nj-text').textContent    = bl.noi_dung;
        el.querySelector('.nj-time').textContent    = thoiGian(bl.ngay_tao ?? bl.created_at);

        if (nd?.da_xac_thuc) el.querySelector('.nj-verified').style.display = 'inline';

        // Nút sửa/xóa chỉ hiện nếu là bình luận của mình
        if (myId() && myId() === (bl.nguoi_dung_id ?? bl.nguoiDungId)) {
            el.querySelector('.nj-btn-edit').style.display   = 'inline';
            el.querySelector('.nj-btn-delete').style.display = 'inline';
        }

        // Reaction bình luận
        if (bl.phan_ung_cua_toi) {
            const likeBtn = el.querySelector('.nj-btn-like-bl');
            likeBtn.classList.add('active');
            const total = Object.values(bl.tong_hop_cam_xuc ?? {}).reduce((a, b) => a + b, 0);
            likeBtn.textContent = `${EMOJI[bl.phan_ung_cua_toi]} ${total || ''}`;
        }

        // Trả lời lồng nhau
        if (!isReply && bl.tra_loi?.length) {
            const replySection = el.querySelector('.nj-reply-section');
            const replyList    = el.querySelector('.nj-reply-list');
            replySection.style.display = 'block';
            bl.tra_loi.forEach(tl => replyList.appendChild(_renderBinhLuan(tl, true)));
        }

        return el;
    }

    // ── Utilities ─────────────────────────────────────────
    function autoResize(el) {
        el.style.height = 'auto';
        el.style.height = el.scrollHeight + 'px';
    }

    function enterSubmit(e, baiVietId) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            guiBinhLuan(baiVietId);
        }
    }

    // ── Init ──────────────────────────────────────────────
    function init() {
        _initPickers();

        // Nút "Bình luận" trên bài viết
        document.querySelectorAll('[data-open-comments]').forEach(btn => {
            btn.addEventListener('click', () => {
                const id      = btn.dataset.openComments;
                const section = document.getElementById(`nj-comments-${id}`);
                if (!section) return;
                const isOpen = section.classList.toggle('open');
                if (isOpen && !_trangBV[id]) taiThem(id, 1);
            });
        });
    }

    document.addEventListener('DOMContentLoaded', init);

    // ── Public API ────────────────────────────────────────
    return {
        nhanThich, chonCamXuc, moModalReaction,
        nhanThichBinhLuan,
        guiBinhLuan, guiTraLoi,
        xoaBinhLuan, suaBinhLuan,
        moTraLoi, taiThem, taiThemTraLoi,
        autoResize, enterSubmit,
    };
})();