<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class NguoiDungFactory extends Factory
{
    protected $model = NguoiDung::class;

    public function definition(): array
    {
        return [
            'ten_dang_nhap' => $this->faker->unique()->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'so_dien_thoai' => $this->faker->optional()->phoneNumber(),
            'mat_khau_hash' => Hash::make('password'),
            'anh_dai_dien' => $this->faker->optional()->imageUrl(),
            'anh_bia' => $this->faker->optional()->imageUrl(),
            'tieu_su' => $this->faker->optional()->paragraph(),
            'ngay_sinh' => $this->faker->optional()->date(),
            'noi_o' => $this->faker->optional()->city(),
            'quyen_rieng_tu' => $this->faker->randomElement(['cong_khai', 'ban_be', 'rieng_tu']),
            'da_xac_thuc' => $this->faker->boolean(),
            'con_hoat_dong' => true,
        ];
    }
}