<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'password' => Hash::make('alex'),
            'office_last_date' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        User::create([
            'name' => 'paco',
            'email' => 'paco@paco.com',
            'password' => Hash::make('paco'),
            'office_last_date' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
