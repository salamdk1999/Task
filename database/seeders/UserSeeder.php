<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Salam Dakhan',
            'username' => 'SalamDk',
            'password' => Hash::make('Sd00000000'),
            'avatar' => null,
            'type' => UserType::GOLD,
        ]);
        User::factory()->count(10)->create();
    }
}
