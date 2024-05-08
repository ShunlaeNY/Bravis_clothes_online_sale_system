<?php

namespace Database\Factories;

use password;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'dob' =>fake()->date(),
            'joining_date'=>Carbon::now(),
            'state/region'=>fake()->address(),
            'phonenumber'=>fake()->phoneNumber(),
            'zipcode'=>fake()->name(),
            'image'=>fake()->name(),
            'uuid'=>Str::uuid()->toString(),
            'status'=>'Active',
            'password' => Hash::make('123456'),
        ];
    }
}
