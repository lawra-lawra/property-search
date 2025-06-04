<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location' => $this->faker->city(),
            'near_beach' => $this->faker->boolean(),
            'accepts_pets' => $this->faker->boolean(),
            'sleeps' => $this->faker->numberBetween(1, 8),
            'beds' => $this->faker->numberBetween(1, 4),
        ];
    }
}
