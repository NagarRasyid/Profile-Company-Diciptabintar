<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Portfolio>
 */
class PortfolioFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory.
     *
     * @var class-string<Portfolio>
     */
    protected $model = Portfolio::class;

    /**
     * Definisi default state of model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(rand(3, 6));
        $categories = ['Konstruksi Komersial', 'Perumahan', 'Renovasi', 'Desain Interior', 'Infrastruktur'];

        return [
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraphs(3, true),
            'client' => $this->faker->company(),
            'category' => $this->faker->randomElement($categories),
            'image' => null,
            'gallery' => null,
            'year' => $this->faker->numberBetween(2018, 2026),
            'url' => $this->faker->optional(0.5)->url(),
            'is_featured' => $this->faker->boolean(30), // 30% chance featured
            'is_active' => $this->faker->boolean(90),   // 90% chance active
            'order' => $this->faker->numberBetween(0, 50),
        ];
    }

    /**
     * State untuk bidang yang menjadi unggulan.
     */
    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }

    /**
     * State untuk bidang yang aktif.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }
}
