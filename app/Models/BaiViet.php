<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaiViet extends Model
{
    // Các cột có thể được gán dữ liệu hàng loạt
    protected $fillable = ['nguoi_dung_id', 'noi_dung', 'loai', 'ngay_tao'];

    // Chỉ định rõ tên bảng trong database
    protected $table = 'bai_viet'; 

    // Tự động cast 'ngay_tao' thành đối tượng Carbon để dùng được diffForHumans()
    protected $casts = [
        'ngay_tao' => 'datetime',
    ];

    // Quan hệ: Bài viết thuộc về một người dùng
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id', 'id');
    }

    // Quan hệ: Một bài viết có thể có nhiều ảnh/video (Media)
    public function media(): HasMany
    {
        return $this->hasMany(MediaBaiViet::class, 'bai_viet_id', 'id');
    }
}