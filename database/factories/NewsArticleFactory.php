<?php

namespace Database\Factories;

use App\Models\NewsArticle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<NewsArticle>
 */
class NewsArticleFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory.
     *
     * @var class-string<NewsArticle>
     */
    protected $model = NewsArticle::class;

    /**
     * Definisi default state of model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(rand(5, 10));
        $isPublished = $this->faker->boolean(80); // 80% published articles

        return [
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence(20),
            'content' => collect($this->faker->paragraphs(rand(3, 6)))->map(fn($p) => "<p>{$p}</p>")->implode(''),
            'image' => null,
            'author' => $this->faker->name(),
            'is_published' => $isPublished,
            'published_at' => $isPublished ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
        ];
    }

    /**
     * State untuk artikel yang sudah dipublikasikan.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
            'published_at' => now(),
        ]);
    }

    /**
     * State untuk artikel yang masih dalam draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
            'published_at' => null,
        ]);
    }
}
