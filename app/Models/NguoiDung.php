<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NguoiDung extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'nguoi_dung';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'ngay_xoa';

    protected $fillable = [
        'ten_dang_nhap',
        'email',
        'so_dien_thoai',
        'mat_khau_hash',
        'anh_dai_dien',
        'anh_bia',
        'tieu_su',
        'ngay_sinh',
        'noi_o',
        'quyen_rieng_tu',
        'da_xac_thuc',
        'con_hoat_dong',
        'nha_cung_cap_oauth',
        'id_oauth',
    ];

    protected $hidden = [
        'mat_khau_hash',
    ];

    protected $casts = [
        'da_xac_thuc' => 'boolean',
        'con_hoat_dong' => 'boolean',
        'ngay_sinh' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'ngay_xoa' => 'datetime',
    ];

    // ── Authentication ────────────────────────────────────
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->mat_khau_hash;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // ── Relations ─────────────────────────────────────────
    public function binhLuan(): HasMany
    {
        return $this->hasMany(BinhLuan::class, 'nguoi_dung_id');
    }

    public function camXuc(): HasMany
    {
        return $this->hasMany(CamXuc::class, 'nguoi_dung_id');
    }
}