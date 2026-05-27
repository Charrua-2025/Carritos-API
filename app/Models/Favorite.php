<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_id'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Usuario que marcó favorito
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Negocio favorito
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}