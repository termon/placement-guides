<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create year 2 students and add to year 2 for cohort
        User::create([
            'name' => 'admin', //fake()->name(),
            'email' => 'admin@mail.com', //fake()->safeEmail(),
            'role' => Role::ADMIN,
            'email_verified_at' => now(),
            'password' => Hash::make('password'), //'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'staff', //fake()->name(),
            'email' => 'staff@mail.com', //fake()->safeEmail(),
            'role' => Role::STAFF,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

    }
}
