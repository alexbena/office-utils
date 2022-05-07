<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Office::create([
            'name' => '103 - office',
            'description' => 'Oficina 103 edificio La Piramide jtsec'
        ]);
        Office::create([
            'name' => 'Pearmind - office',
            'description' => 'El dario you know'
        ]);
        Office::create([
            'name' => '208 - office',
            'description' => 'Oficina 108 edificio La Piramide jtsec'
        ]);
    }
}
