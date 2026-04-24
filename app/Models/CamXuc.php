<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CamXuc extends Model
{
    protected $table      = 'cam_xuc';
    public    $timestamps = false;

    protected $fillable = [
        'nguoi_dung_id',
        'bai_viet_id',
        'binh_luan_id',
        'loai_cam_xuc',
        'ngay_tao',
    ];

    protected $casts = [
        'ngay_tao' => 'datetime',
    ];

    // ── Danh sách loại cảm xúc ────────────────────────────
    public static array $LOAI = [
        'thich'   => ['label' => 'Thích',     'emoji' => '👍', 'color' => '#4f98ff'],
        'tim'     => ['label' => 'Yêu thích', 'emoji' => '❤️',  'color' => '#f93a5a'],
        'haha'    => ['label' => 'Haha',      'emoji' => '😆', 'color' => '#f4b400'],
        'wow'     => ['label' => 'Wow',       'emoji' => '😮', 'color' => '#f4b400'],
        'buon'    => ['label' => 'Buồn',      'emoji' => '😢', 'color' => '#f4b400'],
        'phan_no' => ['label' => 'Phẫn nộ',  'emoji' => '😡', 'color' => '#e05c2a'],
    ];

    // ── Relations ─────────────────────────────────────────
    public function nguoiDung(): BelongsTo
    {
        return $this->belongsTo(NguoiDung::class, 'nguoi_dung_id');
    }

    public function baiViet(): BelongsTo
    {
        return $this->belongsTo(BaiViet::class, 'bai_viet_id');
    }

    public function binhLuan(): BelongsTo
    {
        return $this->belongsTo(BinhLuan::class, 'binh_luan_id');
    }
}