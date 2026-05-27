<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_id',

        'plan',

        'start_date',
        'end_date',

        'amount',

        'active'
    ];

    protected $casts = [

        'start_date' => 'date',
        'end_date' => 'date',

        'amount' => 'decimal:2',

        'active' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Negocio dueño de la suscripción
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}