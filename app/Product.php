<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $attributes = [
        'amount' => 0,
        'reserved' => 0,
        'enabled' => false,
        'buy_count' => 0,
        'is_new' => true,
        'is_hit' => false
    ];

    protected $fillable = [
        'name', 'category_id', 'amount', 'enabled', 'price', 'weight'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeEnabled(Builder $query): Builder
    {
        return $query->where('enabled', 1);
    }

    public function isBuyable(): bool
    {
        return $this->amount - $this->reserved >= $this->weight;
    }
}
