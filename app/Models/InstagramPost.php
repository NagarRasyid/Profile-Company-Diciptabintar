<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class InstagramPost extends Model
{
    use HasFactory;

    protected $table = 'instagram_posts';

    protected $fillable = [
        'image',
        'caption',
        'post_url',
        'is_active',
        'is_pinned',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_pinned' => 'boolean',
        ];
    }

    /**
     * Scope: hanya post yang aktif.
     * Diurutkan: is_pinned DESC (yang dipin di atas), lalu created_at DESC (terbaru).
     */
    public function scopeActive($query)
    {
        return $query
            ->where('is_active', true)
            ->orderByDesc('is_pinned')
            ->latest();
    }

    /**
     * Accessor: URL lengkap gambar dari storage.
     */
    public function getImageUrlAttribute(): string
    {
        return Storage::url($this->image);
    }

    /**
     * Accessor: apakah post punya link Instagram.
     */
    public function getHasLinkAttribute(): bool
    {
        return !empty($this->post_url);
    }
}
