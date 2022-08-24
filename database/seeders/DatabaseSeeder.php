<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->has(Link::factory()->count(50))->create([
            'name' => 'User',
            'email' => 'user@test.com',
        ]);
    }
}
