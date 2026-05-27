<?php

namespace App\Models;

use App\Models\BusinessImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'category_id',
        'neighborhood_id',

        'name',
        'description',

        'address',

        'latitude',
        'longitude',

        'whatsapp',
        'phone',

        'logo',
        'cover_image',

        'delivery_available',
        'pickup_available',

        'opening_time',
        'closing_time',

        'featured',

        'subscription_type',

        'views_count',

        'active'
    ];

    protected $casts = [

        'delivery_available' => 'boolean',
        'pickup_available' => 'boolean',
        'featured' => 'boolean',
        'active' => 'boolean',

        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Dueño del negocio
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Categoría principal
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Barrio/Zona
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // Productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Imágenes del negocio
    public function images()
    {
        return $this->hasMany(BusinessImage::class);
    }

    // Promociones
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    // Favoritos
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Subscripciones
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // Pagos
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}