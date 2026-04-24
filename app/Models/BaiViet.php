<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MediaBaiViet;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'bai_viet';

    protected $fillable = [
        'nguoi_dung_id',
        'bai_goc_id',
        'loai',
        'noi_dung',
        'ten_dia_diem',
        'vi_do',
        'kinh_do',
        'cam_xuc',
        'hoat_dong',
        'quyen_rieng_tu',
        'da_ghim',
        'da_chinh_sua',
        'da_xoa',
    ];

    protected $casts = [
        'vi_do' => 'decimal:8',
        'kinh_do' => 'decimal:8',
        'da_ghim' => 'boolean',
        'da_chinh_sua' => 'boolean',
        'da_xoa' => 'boolean',
    ];

    // ── Relations ─────────────────────────────────────────
    public function nguoiDung(): BelongsTo
    {
        return $this->belongsTo(NguoiDung::class, 'nguoi_dung_id');
    }

    public function baiGoc(): BelongsTo
    {
        return $this->belongsTo(BaiViet::class, 'bai_goc_id');
    }

    public function binhLuan(): HasMany
    {
        return $this->hasMany(BinhLuan::class, 'bai_viet_id');
    }

    public function camXuc(): HasMany
    {
        return $this->hasMany(CamXuc::class, 'bai_viet_id');
    }

    public function mediaBaiViet(): HasMany
    {
        return $this->hasMany(MediaBaiViet::class, 'bai_viet_id')->orderBy('thu_tu');
    }
}