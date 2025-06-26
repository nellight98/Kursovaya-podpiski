<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tariff;
class TariffSeeder extends Seeder
{
    public function run(): void
    {
        Tariff::insert([
            [
    'name' => 'Basic',
    'description' => 'Subscription for 1 month',
    'price' => 199.00,
    'duration_days' => 30,
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'name' => 'Premium',
    'description' => 'Subscription for 3 months',
    'price' => 499.00,
    'duration_days' => 90,
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'name' => 'Platinum',
    'description' => 'Subscription for 3 months',
    'price' => 899.00,
    'duration_days' => 160,
    'created_at' => now(),
    'updated_at' => now(),
],
[
    'name' => 'GOD',
    'description' => 'Subscription for 3 months',
    'price' => 3999.00,
    'duration_days' => 777,
    'created_at' => now(),
    'updated_at' => now(),
],

        ]);
    }
}

