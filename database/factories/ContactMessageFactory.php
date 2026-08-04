<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactMessage>
 */
class ContactMessageFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory.
     *
     * @var class-string<ContactMessage>
     */
    protected $model = ContactMessage::class;

    /**
     * Definisi default state of model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isRead = $this->faker->boolean(40); // 40% read messages

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->optional(0.7)->phoneNumber(),
            'subject' => $this->faker->optional(0.8)->sentence(rand(3, 7)),
            'message' => $this->faker->paragraph(rand(2, 5)),
            'is_read' => $isRead,
            'read_at' => $isRead ? $this->faker->dateTimeBetween('-1 month', 'now') : null,
        ];
    }

    /**
     * State untuk pesan yang belum dibaca.
     */
    public function unread(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_read' => false,
            'read_at' => null,
        ]);
    }

    /**
     * State untuk pesan yang sudah dibaca.
     */
    public function read(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_read' => true,
            'read_at' => now(),
        ]);
    }
}
