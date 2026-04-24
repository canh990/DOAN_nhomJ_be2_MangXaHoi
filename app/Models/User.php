<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
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
    'remember_token',
])]
#[Hidden(['mat_khau_hash', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'nguoi_dung';

    public const DELETED_AT = 'ngay_xoa';

    /**
     * Keep Laravel Auth compatible with the Vietnamese password column.
     */
    public function getAuthPasswordName(): string
    {
        return 'mat_khau_hash';
    }

    public function getNameAttribute(): string
    {
        return $this->ten_dang_nhap;
    }

    protected function casts(): array
    {
        return [
            'ngay_sinh' => 'date',
            'da_xac_thuc' => 'boolean',
            'con_hoat_dong' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'ngay_xoa' => 'datetime',
            'mat_khau_hash' => 'hashed',
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
