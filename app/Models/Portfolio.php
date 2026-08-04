<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'title',
    'slug',
    'description',
    'client',
    'category',
    'image',
    'gallery',
    'year',
    'url',
    'is_featured',
    'is_active',
    'order',
])]
class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Atribut bidang yang harus di cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'gallery'     => 'array',
            'year'        => 'integer',
            'is_featured' => 'boolean',
            'is_active'   => 'boolean',
            'order'       => 'integer',
        ];
    }

    /**
     * Bidang yang aktif.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Bidang yang diunggulkan.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Bidang berdasarkan kategori.
     */
    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Urutan bidang.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
