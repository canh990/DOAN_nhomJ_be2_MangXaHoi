{{--
    Component: comment-section
    Props:
      $baiVietId : int
--}}
@props(['baiVietId'])

<div class="nj-comment-section" id="nj-comments-{{ $baiVietId }}">

    {{-- Composer --}}
    <div class="nj-composer">
        <img class="nj-avatar"
             src="{{ Auth::user()->anh_dai_dien ?? asset('images/default-avatar.png') }}"
             alt="avatar"/>
        <div class="nj-composer-inner">
            <textarea class="nj-composer-input"
                      id="nj-input-{{ $baiVietId }}"
                      placeholder="Viết bình luận..."
                      rows="1"
                      oninput="NJ.autoResize(this)"
                      onkeydown="NJ.enterSubmit(event, {{ $baiVietId }})"></textarea>
            <div class="nj-composer-toolbar">
                <button class="nj-toolbar-btn" title="Ảnh" type="button">📷</button>
                <button class="nj-toolbar-btn" title="GIF" type="button">GIF</button>
                <button class="nj-toolbar-btn" title="Sticker" type="button">🎭</button>
                <button class="nj-btn-post" type="button"
                        onclick="NJ.guiBinhLuan({{ $baiVietId }})">Đăng</button>
            </div>
        </div>
    </div>

    {{-- Danh sách bình luận --}}
    <div class="nj-comment-list" id="nj-list-{{ $baiVietId }}"></div>

    <button class="nj-btn-loadmore" id="nj-loadmore-{{ $baiVietId }}"
            style="display:none"
            onclick="NJ.taiThem({{ $baiVietId }})">
        ↓ Xem thêm bình luận
    </button>
</div>

{{-- Template bình luận (clone bằng JS) --}}
<template id="nj-tmpl-comment">
    <div class="nj-comment-item" data-id="">
        <img class="nj-avatar" src="" alt=""/>
        <div class="nj-comment-body">
            <div class="nj-bubble">
                <div class="nj-author-row">
                    <span class="nj-author"></span>
                    <span class="nj-verified" style="display:none">✔</span>
                </div>
                <p class="nj-text"></p>
            </div>
            <div class="nj-meta">
                <span class="nj-time"></span>
                <button class="nj-meta-btn nj-btn-like-bl" type="button"
                        onclick="NJ.nhanThichBinhLuan(this)">Thích</button>
                <button class="nj-meta-btn" type="button"
                        onclick="NJ.moTraLoi(this)">Trả lời</button>
                <button class="nj-meta-btn nj-btn-edit" type="button" style="display:none"
                        onclick="NJ.suaBinhLuan(this)">Sửa</button>
                <button class="nj-meta-btn nj-btn-delete" type="button" style="display:none"
                        onclick="NJ.xoaBinhLuan(this)">Xóa</button>
            </div>

            {{-- Reply section --}}
            <div class="nj-reply-section" style="display:none">
                <div class="nj-reply-composer">
                    <img class="nj-avatar sm"
                         src="{{ Auth::user()->anh_dai_dien ?? asset('images/default-avatar.png') }}"
                         alt="me"/>
                    <input class="nj-reply-input" type="text" placeholder="Trả lời..."/>
                    <button class="nj-btn-post sm" type="button"
                            onclick="NJ.guiTraLoi(this)">Gửi</button>
                </div>
                <div class="nj-reply-list"></div>
                <button class="nj-btn-loadmore-reply" style="display:none"
                        onclick="NJ.taiThemTraLoi(this)">Xem thêm trả lời</button>
            </div>
        </div>
    </div>
</template>