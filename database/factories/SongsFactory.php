<?php

namespace Database\Factories;

use App\Models\Songs;//Import
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Songs>
 */
class SongsFactory extends Factory
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
            'title'=>$this->faker->company,
            'autor'=>$this->faker->name,
            'album'=>$this->faker->text(30),
        ];
    }
}
