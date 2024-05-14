<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => fake()->name(),
            'price'=>fake()->randomNumber(),
            'small_qty'=>fake()->randomNumber(),
            'medium_qty'=>fake()->randomNumber(),
            'large_qty'=>fake()->randomNumber(),
            'gender'=>fake()->name(),
            'description'=>fake()->name(),
            'image'=>fake()->name(),
            'color_image'=>fake()->name(),
            'uuid'=>Str::uuid()->toString(),
            'status'=>'Active',
        ];
    }
}
