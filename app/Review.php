<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $fillable = [
        'url'
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        self::creating(function (Model $model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function scopeRandom(Builder $query, int $count)
    {
        return $query->orderBy(DB::raw('RAND()'))->take($count);
    }
}
