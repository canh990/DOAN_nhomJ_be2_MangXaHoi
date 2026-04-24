<?php

namespace Database\Factories;

use App\Models\BaiViet;
use App\Models\NguoiDung;
use Illuminate\Database\Eloquent\Factories\Factory;

class BaiVietFactory extends Factory
{
    protected $model = BaiViet::class;

    public function definition(): array
    {
        return [
            'nguoi_dung_id' => NguoiDung::factory(),
            'loai' => $this->faker->randomElement(['van_ban', 'anh', 'video']),
            'noi_dung' => $this->faker->paragraph(),
            'quyen_rieng_tu' => $this->faker->randomElement(['cong_khai', 'ban_be', 'rieng_tu']),
            'da_ghim' => false,
            'da_chinh_sua' => false,
            'da_xoa' => false,
        ];
    }
}