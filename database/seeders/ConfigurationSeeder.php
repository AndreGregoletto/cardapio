<?php

namespace Database\Seeders;

use App\Models\Configuration;
use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::create([
            'name'         => 'Nome a Definir',
            'logo'         => 'img/logo.png',
            'type'         => 'A definir',
            'delivery'     => 40,
            'delivery_fee' => 3.00,
            'open'         => now()->format('H:1:s'),
            'close'        => now()->format('H:1:s') 
        ]);
    }
}
