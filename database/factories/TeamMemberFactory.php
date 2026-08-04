<?php

namespace Database\Factories;

use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TeamMember>
 */
class TeamMemberFactory extends Factory
{
    /**
     * Nama model yang sesuai dengan factory.
     *
     * @var class-string<TeamMember>
     */
    protected $model = TeamMember::class;

    /**
     * Definisi default state of model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = [
            'Direktur Utama (CEO)',
            'Direktur Teknik (CTO)',
            'Direktur Keuangan (CFO)',
            'Kepala Divisi Desain',
            'Manajer Proyek Senior',
            'Kepala Pengawas Lapangan',
            'Site Engineer',
            'Quantity Surveyor',
        ];

        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->randomElement($positions),
            'bio' => $this->faker->paragraph(2),
            'photo' => null,
            'order' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(95), // 95% active
        ];
    }

    /**
     * State untuk anggota tim yang aktif.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }
}
