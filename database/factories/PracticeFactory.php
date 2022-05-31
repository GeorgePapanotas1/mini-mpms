<?php

namespace Database\Factories;

use App\Models\Field;
use App\Models\Practice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practice>
 */
class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'email' => $this->faker->unique()->safeEmail(),
            'website_url' => $this->faker->domainName(),
        ];
    }

    public function configure()
    {
        return $this
            ->afterCreating(function(Practice $practice){
                $practice->fields()->attach(Field::inRandomOrder()->take(rand(1,5))->pluck('id'));
            });
    }
}
