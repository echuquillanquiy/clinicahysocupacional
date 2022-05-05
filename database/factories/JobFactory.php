<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Job;
use App\Models\Place;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(2);
        $category = Area::all()->random();
        $place = Place::all()->random();
        $type = Schedule::all()->random();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'slug' => Str::slug($title),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement([Job::BORRADOR, Job::PUBLICADO]),
            'ending' => Carbon::now()->addDays(5),
            'user_id' => $this->faker->randomElement([1,2,3,4,5]),
            'area_id' => $category->id,
            'place_id' => $place->id,
            'schedule_id' => $type->id,
        ];
    }
}
