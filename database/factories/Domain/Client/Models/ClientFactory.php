<?php

namespace Database\Factories\Domain\Client\Models;

use App\Domain\Client\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->numerify('###########'),
            'birth_date' => $this->faker->date('Y-m-d'),
            'address' => $this->faker->randomElement([
                'São Paulo',
                'Guarulhos',
                'Taboão da serra',
                'Barueri',
            ]),
            'complement' => $this->faker->streetAddress(),
            'neighborhood' => $this->faker->randomElement([
                'Bela Vista',
                'Jardins',
                'Cerqueira Cesar',
                'Alphaville',
            ]),
            'zip_code' => $this->faker->numerify('#########'),
        ];
    }
}
