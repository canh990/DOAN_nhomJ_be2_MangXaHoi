<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\BaiViet;
use App\Models\MediaBaiViet;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'noi_dung' => 'nullable|string',
            'media.*' => 'file|mimes:jpg,jpeg,png,gif,mp4|max:20480'
        ]);

        $post = BaiViet::create([
            'nguoi_dung_id' => 1,
            'noi_dung' => $request->noi_dung,
            'loai' => $request->hasFile('media') ? 'hinh_anh' : 'van_ban'
        ]);

        if ($request->hasFile('media')) {
            foreach (Arr::wrap($request->file('media')) as $file) {
                $path = $file->store('posts', 'public');

                MediaBaiViet::create([
                    'bai_viet_id' => $post->id,
                    'loai' => str_contains($file->getMimeType(), 'video') ? 'video' : 'hinh_anh',
                    'duong_dan' => $path
                ]);
            }
        }

        return back()->with('success', 'Đã đăng bài thành công!');
    }
}