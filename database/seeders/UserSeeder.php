<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create()->each(function (User $user) {
            $user->createOrGetStripeCustomer();
        });

        User::factory()->create([
            'email' => 'j.bode@lottok.com',
            'password' => Hash::make('HstUe&836!'),
            'is_admin' => true,
            'credits' => 1000
        ])->each(function (User $user) {
            $user->createOrGetStripeCustomer();
        });
    }
}
