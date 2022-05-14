<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nom = $this->faker->sentence;
        return [
            "slug" => Str::slug($nom),
            "nom" => $nom,
            "prix" => rand(1000,100000)
        ];

    }
}
