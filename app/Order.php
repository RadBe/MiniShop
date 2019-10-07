<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const STATUS_WAIT = 0,
                STATUS_APPROVED = 1,
                STATUS_DONE = 2;

    public const STATUS_NAME = [
        self::STATUS_WAIT => 'Ожидание',
        self::STATUS_APPROVED => 'Подтвержден',
        self::STATUS_DONE => 'Выполнен'
    ];

    protected $attributes = [
        'phone' => null,
        'vk' => null,
        'status' => 0
    ];

    protected $fillable = [
        'phone', 'vk'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['amount', 'price']);
    }

    public function calcSum()
    {
        $sum = 0;
        foreach ($this->products as $product)
        {
            $sum += $product->pivot->price;
        }

        return $sum;
    }
}
