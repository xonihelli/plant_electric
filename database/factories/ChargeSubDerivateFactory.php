<?php

namespace Database\Factories;

use App\Models\ChargeSubDerivate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChargeSubDerivate>
 */
class ChargeSubDerivateFactory extends Factory
{
    /**
     * Summary of model
     * @var string
     */
    protected $model = ChargeSubDerivate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'charge_derivate_id' => \App\Models\ChargeDerivate::factory(),
            'name' => $this->faker->word,
            'kw' => $this->faker->randomFloat(2, 0, 100),
            'a' => $this->faker->randomFloat(2, 0, 100),
            'brand' => $this->faker->word,
            'model' => $this->faker->word,
            'capacity' => $this->faker->randomFloat(2, 0, 100),
            'location' => $this->faker->word,
            'lightning_discharge' => $this->faker->randomFloat(2, 0, 100),
            'surge' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
