<?php

namespace Database\Factories;

use App\Models\ElectricCharge;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElectricCharge>
 */
class ElectricChargeFactory extends Factory
{
    /**
     * Summary of model
     * @var
     */
    protected $model = ElectricCharge::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id' => \App\Models\Room::factory(),
            'name' => $this->faker->word,
            'kw' => $this->faker->randomFloat(2, 0, 100),
            'a' => $this->faker->randomFloat(2, 0, 100),
            'total_kw' => $this->faker->randomFloat(2, 0, 100),
            'total_a' => $this->faker->randomFloat(2, 0, 100),
            'fu_general' => $this->faker->randomFloat(2, 0, 100),
            'fu_kw' => $this->faker->randomFloat(2, 0, 100),
            'fu_a' => $this->faker->randomFloat(2, 0, 100),
            'measurement_date' => $this->faker->dateTime(),
        ];
    }
}
