<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'code_type',
        'type',
        'value',
        'min_cart_value',
        'usage_limit',
        'used_count',
        'expires_at',
        'status',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_coupon');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_coupon');
    }
}