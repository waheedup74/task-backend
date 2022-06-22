<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttachProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(\App\Models\User::all())['id'],
            'product_id' => $this->faker->randomElement(\App\Models\Product::all())['id'],
            'quantity' => rand(10,100),
        ];
    }
}
