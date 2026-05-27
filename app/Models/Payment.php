<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_id',

        'amount',

        'payment_method',

        'transaction_id',

        'status',

        'paid_at'
    ];

    protected $casts = [

        'amount' => 'decimal:2',

        'paid_at' => 'datetime'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Negocio dueño del pago
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}