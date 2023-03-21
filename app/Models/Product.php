<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'name',
        'price',
        'low_stock',
        'optimal_stock',
        'barcode',
        'category_id'
    ];

    public function stock(){
        return $this->hasOne(Stock::class);
    }

    public function hasLowStock() {
        return $this->stock()->quantity <= $this->low_stock;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
