<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TariffSeeder;
use Database\Seeders\SubscriptionSeeder; // не забудь импорт!

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // если нужно задать пароль
            ]
        );

        $this->call(TariffSeeder::class);
        $this->call(SubscriptionSeeder::class); // <-- сюда вставляешь вызов
    }
}
