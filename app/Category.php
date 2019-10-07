<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $attributes = [
        'enabled' => false
    ];

    protected $fillable = [
        'name', 'enabled', 'slug'
    ];

    public $timestamps = false;

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug(mb_substr($this->name, 0, 32));
    }
}
