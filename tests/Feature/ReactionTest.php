<?php

namespace Tests\Feature;

use App\Models\BinhLuan;
use App\Models\CamXuc;
use App\Models\NguoiDung;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_toggle_reaction_on_comment()
    {
        // Tạo user và comment
        $user = NguoiDung::factory()->create();
        $comment = BinhLuan::factory()->create();

        // Đăng nhập
        $this->actingAs($user, 'sanctum');

        // Gửi request toggle reaction
        $response = $this->postJson("/api/binh-luan/{$comment->id}/reaction", [
            'loai_cam_xuc' => 'thich'
        ]);

        // Kiểm tra response
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'action',
                     'tong_so',
                     'tong_hop',
                     'phan_ung_hien_tai',
                     'labels'
                 ]);

        // Kiểm tra database
        $this->assertDatabaseHas('cam_xuc', [
            'nguoi_dung_id' => $user->id,
            'binh_luan_id' => $comment->id,
            'loai_cam_xuc' => 'thich'
        ]);
    }
}