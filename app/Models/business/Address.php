<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     protected $fillable = [
        'address_business_id',
        'address_street',
        'address_number',
        'address_between1',
        'address_between2',
        'address_city',
        'address_state',
        'address_country',
        ];

         public function address(){
             return $this->belongsTo(Business::class);
        }
}