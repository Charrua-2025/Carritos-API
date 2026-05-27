<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_id',

        'name',
        'description',

        'price',

        'image',

        'available',
        'featured'
    ];

    protected $casts = [

        'price' => 'decimal:2',

        'available' => 'boolean',
        'featured' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Negocio dueño del producto
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    // Categorías del producto (many to many)
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}