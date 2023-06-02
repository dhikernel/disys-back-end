<?php

namespace Database\Factories\Domain\Product\Models;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->numberBetween(1, 99),
            'name' => $this->faker->randomElement([
                'Pastel de frango',
                'Pastel de carne',
                'Pastel de queijo',
            ]),
            'price' => $this->faker->randomFloat(2, 20),
            'photo' => $this->faker->imageUrl(),
        ];
    }
}
