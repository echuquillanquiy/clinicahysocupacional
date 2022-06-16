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
            'name' => 'Raúl Eduardo',
            'lastname' => 'Chuquillanqui Yupanqui',
            'username' => 'echuquillanquiy',
            'profile' => 'Administrador',
            'phone' => '933247583',
            'email' => 'echuquillanquiy@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
