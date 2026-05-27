<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Negocios de esta categoría
    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    // Productos relacionados (many to many)
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}