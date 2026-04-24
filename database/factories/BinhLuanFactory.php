<?php

namespace Database\Factories;

use App\Models\BinhLuan;
use App\Models\BaiViet;
use App\Models\NguoiDung;
use Illuminate\Database\Eloquent\Factories\Factory;

class BinhLuanFactory extends Factory
{
    protected $model = BinhLuan::class;

    public function definition(): array
    {
        return [
            'bai_viet_id' => BaiViet::factory(),
            'nguoi_dung_id' => NguoiDung::factory(),
            'binh_luan_cha_id' => null,
            'noi_dung' => $this->faker->paragraph(),
            'da_xoa' => false,
        ];
    }
}