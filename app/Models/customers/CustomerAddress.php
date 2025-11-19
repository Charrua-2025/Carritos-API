<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
     protected $fillable = [
        'address_customer_id',
        'address_customer_street',
        'address_customer_number',
        'address_customer_between1',
        'address_customer_between2',
        'address_customer_city',
        'address_customer_state',
        'address_customer_country',
        ];

           public function customer(){
             return $this->belongsTo(Customer::class);
        }
}