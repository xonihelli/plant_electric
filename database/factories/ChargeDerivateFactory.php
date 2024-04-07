<?php

namespace Database\Factories;

use App\Models\ChargeDerivate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChargeDerivate>
 */
class ChargeDerivateFactory extends Factory
{
    /**
     * Summary of model
     * @var string
     */
    protected $model = ChargeDerivate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'electric_charge_id' => \App\Models\ElectricCharge::factory(),
            'name_technical' => $this->faker->word,
            'name' => $this->faker->word,
            'kw' => $this->faker->randomFloat(2, 0, 100),
            'a' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
