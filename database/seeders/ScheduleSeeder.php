<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'name' => 'TIEMPO COMPLETO'
        ]);

        Schedule::create([
            'name' => 'TIEMPO PARCIAL'
        ]);
    }
}
