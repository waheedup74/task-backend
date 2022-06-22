<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakerFileName = $this->faker->image(
            storage_path("app/public"),
            800,
            600
        );
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(800,600),
            'amount' => rand(100,200),
            'status' => $this->faker->randomElement(['0' ,'1']),
        ];
    }
}
