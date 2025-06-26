<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tariff;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $tariffs = Tariff::all();

        if ($users->isEmpty() || $tariffs->isEmpty()) {
            $this->command->info('No users or tariffs found, skipping subscriptions seeding.');
            return;
        }

        foreach ($users as $user) {
            // создадим по одной подписке для каждого пользователя на первый тариф
            $tariff = $tariffs->first();

            Subscription::create([
                'user_id' => $user->id,
                'tariff_id' => $tariff->id,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonth(),
                'status' => 'active',
            ]);

            $this->command->info("Subscription created for user {$user->email}");
        }
    }
}
