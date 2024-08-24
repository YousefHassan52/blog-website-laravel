<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'yousef hassan moustafa',
            'email' => 'yousef@tech.com',
            'password' => bcrypt('yousef@1'),
        ]);
    }
}
