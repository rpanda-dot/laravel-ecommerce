<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function orders()
    {
        return $this->belongsToMany(Product::class);
    }
    protected $casts = [
        'product_images' => 'array',
    ];
}
