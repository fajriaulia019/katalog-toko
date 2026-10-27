<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'price',
        'size',
        'image_path',
        'status',
        'is_best_seller',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_best_seller' => 'boolean',
        ];
    }

    // ──────────────────────────────────────────────
    // Query Scopes
    // ──────────────────────────────────────────────

    /**
     * Produk yang masih dijual (available atau out_of_stock).
     * Produk discontinued dikecualikan dari katalog publik.
     */
    public function scopePublished(Builder $query): void
    {
        $query->whereIn('status', ['available', 'out_of_stock']);
    }

    /**
     * Hanya produk yang tersedia (stok ada).
     */
    public function scopeAvailable(Builder $query): void
    {
        $query->where('status', 'available');
    }

    /**
     * Produk Best Seller yang masih aktif.
     */
    public function scopeBestSeller(Builder $query): void
    {
        $query->where('is_best_seller', true)
            ->where('status', 'available');
    }

    /**
     * Produk terbaru dalam rentang hari tertentu (default 14 hari).
     * Menggunakan created_at sesuai business rule.
     */
    public function scopeRecentlyAdded(Builder $query, int $days = 14): void
    {
        $query->where('created_at', '>=', now()->subDays($days))
            ->where('status', 'available')
            ->orderByDesc('created_at');
    }

    // ──────────────────────────────────────────────
    // Accessors / Helpers
    // ──────────────────────────────────────────────

    /**
     * Label status yang siap ditampilkan ke publik.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'available' => 'Tersedia',
            'out_of_stock' => 'Habis',
            'discontinued' => 'Tidak Dijual',
            default => ucfirst($this->status),
        };
    }

    /**
     * Apakah produk ini boleh tampil di katalog publik?
     */
    public function getIsPublishedAttribute(): bool
    {
        return in_array($this->status, ['available', 'out_of_stock']);
    }
}
