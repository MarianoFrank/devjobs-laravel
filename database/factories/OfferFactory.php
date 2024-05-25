<?php

namespace Database\Factories;

use DateTime;
use Faker\Generator as FakerGenerator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fecha_actual = new DateTime();
        $fecha_minima = $fecha_actual->modify('+1 day');

        return [
            "title" => $this->faker->sentence(3),
            "salary_id" => rand(1, 9),
            "category_id" => rand(1, 10),
            "company" => $this->faker->sentence(2),
            "expire" => $this->faker->dateTimeBetween($fecha_minima, '+1 year'),
            "description" => $this->faker->text(3000),
            "image" => $this->faker->picsum(public_path("storage/offers"), 150, 150, false),
            "recruiter_id" => 2,
        ];
    }
}
