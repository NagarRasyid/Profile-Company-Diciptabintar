<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'name',
    'position',
    'bio',
    'photo',
    'order',
    'is_active',
])]
class TeamMember extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Tabel anggota tim.
     *
     * @var string
     */
    protected $table = 'team_members';

    /**
     * Atribut anggota tim yang harus di cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order'     => 'integer',
        ];
    }

    /**
     * Anggota tim yang aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Urutan anggota tim.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
