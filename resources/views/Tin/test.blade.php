<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Test Reaction + Comment</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="background:#111;color:white;font-family:sans-serif">

<h2>Bài viết demo</h2>

<article data-post-id="1" style="border:1px solid #444;padding:15px;width:400px">

    <p>Đây là bài viết test</p>

    <!-- LIKE -->
    <button onclick="likePost(this)">👍 Thích</button>

    <!-- COMMENT -->
    <div style="margin-top:10px">
        <input type="text" class="comment-input" placeholder="Nhập comment...">
        <button onclick="commentPost(this)">Gửi</button>

        <div class="comment-list" style="margin-top:10px"></div>
    </div>

</article>

<script>
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function likePost(btn) {
    let post = btn.closest("article");
    let postId = post.dataset.postId;

    fetch(`/reaction/${postId}`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrf
        }
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
    });
}

function commentPost(btn) {
    let post = btn.closest("article");
    let postId = post.dataset.postId;
    let input = post.querySelector(".comment-input");

    fetch(`/comment/${postId}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf
        },
        body: JSON.stringify({
            content: input.value
        })
    })
    .then(res => res.json())
    .then(data => {
        let list = post.querySelector(".comment-list");
        list.innerHTML += `<p>• ${data.content}</p>`;
        input.value = "";
    });
}
</script>

</body>
</html>