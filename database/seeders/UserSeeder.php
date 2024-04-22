<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'David Freitas',
            'username' => 'dvdfreitas',
            'runner' => 'guide',            
            'email' => 'david.freitas@aeg1.pt',
            'password' => Hash::make('passwd'),
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Lascabim',
            'username' => 'lascabim',
            'runner' => 'guide',            
            'email' => 'ze@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123123123'),
            'created_at' => now(),
        ]);
    }
}
