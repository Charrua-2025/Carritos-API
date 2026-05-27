<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [

        'business_id',

        'title',
        'description',

        'image',

        'start_date',
        'end_date',

        'active'
    ];

    protected $casts = [

        'start_date' => 'date',
        'end_date' => 'date',

        'active' => 'boolean'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    // Negocio dueño de la promoción
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}