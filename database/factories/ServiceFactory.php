<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraph(3),
            'image' => $this->faker->image('public/storage/services', 1920, 1280, null, false),
        ];
    }
}
