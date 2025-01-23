<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'username' => 'admin',
            'email' => 'linusnadig@gmail.com',
            'password' => 'admin',
        ]);

        Card::factory(40)->for($user)->create([
            'title' => 'test',
        ]);
    }
}
