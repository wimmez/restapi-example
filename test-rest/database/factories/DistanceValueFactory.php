<?php

namespace Database\Factories;

use App\Models\DistanceValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistanceValueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DistanceValue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => 0,
            'unit' => null,
        ];
    }
}
