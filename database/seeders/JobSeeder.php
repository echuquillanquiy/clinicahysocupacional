<?php

namespace Database\Seeders;

use App\Models\Benefit;
use App\Models\Image;
use App\Models\Job;
use App\Models\Requirement;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Job::factory(25)->create()->each(function (Job $job){

            Requirement::factory(4)->create([
                'job_id' => $job->id
            ]);

            Benefit::factory(4)->create([
                'job_id' => $job->id
            ]);
        });
    }
}
