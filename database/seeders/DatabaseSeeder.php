<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/services');
        Storage::deleteDirectory('public/places');
        Storage::deleteDirectory('public/jobs');

        Storage::makeDirectory('public/services');
        Storage::makeDirectory('public/places');
        Storage::makeDirectory('public/jobs');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(JobSeeder::class);
    }
}
