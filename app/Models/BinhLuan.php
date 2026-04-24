<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BinhLuan extends Model
{
    protected $table = 'binh_luan';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';

    protected $fillable = [
        'bai_viet_id',
        'nguoi_dung_id',
        'binh_luan_cha_id',
        'noi_dung',
        'da_xoa',
    ];

    protected $casts = [
        'da_xoa'        => 'boolean',
        'ngay_tao'      => 'datetime',
        'ngay_cap_nhat' => 'datetime',
    ];

    // ── Scopes ────────────────────────────────────────────
    /** Chỉ lấy bình luận gốc (không phải trả lời) */
    public function scopeGoc($query)
    {
        return $query->whereNull('binh_luan_cha_id')->where('da_xoa', 0);
    }

    /** Chưa bị xóa */
    public function scopeChuaXoa($query)
    {
        return $query->where('da_xoa', 0);
    }

    // ── Relations ─────────────────────────────────────────
    public function nguoiDung(): BelongsTo
    {
        return $this->belongsTo(NguoiDung::class, 'nguoi_dung_id');
    }

    public function baiViet(): BelongsTo
    {
        return $this->belongsTo(BaiViet::class, 'bai_viet_id');
    }

    public function cha(): BelongsTo
    {
        return $this->belongsTo(BinhLuan::class, 'binh_luan_cha_id');
    }

    /** Các trả lời của bình luận này */
    public function traLoi(): HasMany
    {
        return $this->hasMany(BinhLuan::class, 'binh_luan_cha_id')
                    ->chuaXoa()
                    ->with('nguoiDung:id,ten_dang_nhap,anh_dai_dien,da_xac_thuc')
                    ->orderBy('ngay_tao');
    }

    /** Cảm xúc của bình luận */
   public function camXuc(): HasMany
{
    // Giả sử Model cảm xúc của bạn tên là CamXuc
    // Và trong bảng 'cam_xuc' có cột 'binh_luan_id'
    return $this->hasMany(CamXuc::class, 'binh_luan_id');
}
    // ── Helpers ───────────────────────────────────────────
    /** Soft delete: giữ record, ẩn nội dung */
    public function thuHoi(): void
    {
        $this->update([
            'da_xoa'   => 1,
            'noi_dung' => '[Bình luận đã bị xóa]',
        ]);
    }
    // Trong file app/Models/CamXuc.php

public function binhLuan(): BelongsTo
{
    return $this->belongsTo(BinhLuan::class, 'binh_luan_id');
}
}