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
    public function run()
    {
        User::create([
            'name'      => 'André Gregoletto',
            'email'     => 'andre@email.com',
            'password' => 123
        ])->roles()->attach(1);

        User::create([
            'name'      => 'Funcionário',
            'email'     => 'fun@email.com',
            'password' => 123
        ])->roles()->attach(2);
    }
}
