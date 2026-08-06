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
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active'  => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Scope: hanya post yang aktif, diurutkan berdasarkan sort_order ASC, lalu created_at DESC.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->latest();
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
