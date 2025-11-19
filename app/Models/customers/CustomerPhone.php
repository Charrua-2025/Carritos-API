<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerPhones extends Model
{
     protected $fillable = [
        'phone_customer_id',
        'phone_customer_prefix',
        'phone_customer_number',
        
        ];

            public function customer(){
             return $this->belongsTo(Customer::class);
        }
}