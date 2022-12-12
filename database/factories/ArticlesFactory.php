<?php

namespace Database\Factories;

use App\Models\Tags;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'         => fake()->sentence(4,true),
            'slug'          => fake()->slug(),
            'description'   => fake()->sentences('3',true),
            'contain'       => fake()->paragraphs(3,true),
            'tag'           => fake()->word(3)
        ];
    }
}
