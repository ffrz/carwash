<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const TYPE_NON_STOCKED = 0;
    const TYPE_STOCKED = 1;
    const TYPE_SERVICE = 2;
    const TYPE_COMPOSITE = 3;

    use HasFactory;

    protected $fillable = [
        'category_id',
        'type',
        'name',
        'cost',
        'price',
        'active',
        'notes',
        'stock',
        'uom',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
