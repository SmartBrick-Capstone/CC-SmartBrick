<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->name(),
            'date' => $this->faker->date(),
            'content' => $this->faker->paragraph(3, true),
            'image' => 'https://source.unsplash.com/random/800x450/?recycle',
        ];
    }
}
