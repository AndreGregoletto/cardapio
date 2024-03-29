<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory(20)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ConfigurationSeeder::class
        ]);
    }
}
