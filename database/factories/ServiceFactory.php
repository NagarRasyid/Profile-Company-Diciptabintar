<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory.
     *
     * @var class-string<Service>
     */
    protected $model = Service::class;

    /**
     * Definisi default state of model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $icons = [
            'fas fa-hard-hat',
            'fas fa-tools',
            'fas fa-drafting-compass',
            'fas fa-building',
            'fas fa-couch',
            'fas fa-tasks',
            'fas fa-eye',
            'fas fa-wrench',
            'fas fa-ruler-combined',
            'fas fa-paint-roller',
        ];

        $title = $this->faker->unique()->words(rand(2, 4), true);

        return [
            'title'       => ucwords($title),
            'slug'        => Str::slug($title),
            'description' => $this->faker->paragraphs(2, true),
            'icon'        => $this->faker->randomElement($icons),
            'image'       => null,
            'is_active'   => $this->faker->boolean(80), // 80% chance active
            'order'       => $this->faker->numberBetween(0, 20),
        ];
    }

    /**
     * State untuk layanan yang aktif.
     */
    public function active(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => true,
        ]);
    }

    /**
     * State untuk layanan yang tidak aktif.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }
}
