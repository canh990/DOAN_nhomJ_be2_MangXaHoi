<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'ten_dang_nhap' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'so_dien_thoai' => fake()->unique()->numerify('09########'),
            'mat_khau_hash' => static::$password ??= Hash::make('password'),
            'anh_dai_dien' => null,
            'anh_bia' => null,
            'tieu_su' => fake()->optional()->sentence(),
            'ngay_sinh' => fake()->optional()->date(),
            'noi_o' => fake()->optional()->city(),
            'quyen_rieng_tu' => 'cong_khai',
            'da_xac_thuc' => true,
            'con_hoat_dong' => true,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
