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
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'alex',
            'email' => 'alexbenacruz@gmail.com',
            'password' => Hash::make('alex')
        ]);
        User::create([
            'name' => 'paco',
            'email' => 'paco@paco.com',
            'password' => Hash::make('paco')
        ]);
    }
}
