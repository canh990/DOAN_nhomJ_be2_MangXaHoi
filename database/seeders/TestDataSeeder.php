<?php

namespace Database\Seeders;

use App\Models\BaiViet;
use App\Models\BinhLuan;
use App\Models\NguoiDung;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo user test
        $user = NguoiDung::factory()->create([
            'ten_dang_nhap' => 'testuser',
            'email' => 'test@example.com',
            'mat_khau_hash' => bcrypt('password'),
        ]);

        // Tạo bài viết
        $post = BaiViet::factory()->create([
            'nguoi_dung_id' => $user->id,
            'noi_dung' => 'Bài viết test để kiểm tra cảm xúc',
        ]);

        // Tạo bình luận
        $comment = BinhLuan::factory()->create([
            'bai_viet_id' => $post->id,
            'nguoi_dung_id' => $user->id,
            'noi_dung' => 'Bình luận test để thả cảm xúc',
        ]);
    }
}