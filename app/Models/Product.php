<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'brand',
        'stock',
        'active',
        'has_variant',
        'sale_price',
        'acquisition_price',
        'description',        
    ];

    public function saleDescriptions()
    {
        return $this->hasMany(SaleDescription::class);
    }
    
    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
