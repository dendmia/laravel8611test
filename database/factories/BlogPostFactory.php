<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     * @throws \Exception
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(nbWords: random_int(3, 8));
        $txt = $this->faker->realText(maxNbChars: random_int(1000, 4000));
        $isPublished = random_int(1, 5) > 1;

        return [
            'category_id' => random_int(1, 11),
            'user_id' => (random_int(1, 5) === 5) ? 1 : 2,
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->text(random_int(40, 100)),
            'content_raw' => $txt,
            'content_html' => $txt,
            'is_published' => $isPublished,
            'published_at' => $isPublished ?
                $this->faker->dateTimeBetween(startDate: '-2 months', endDate: '-1 days')
                : null,
        ];
    }
}
