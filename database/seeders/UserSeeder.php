<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Caicedo M',
            'email' => 'juan@juandevops.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
