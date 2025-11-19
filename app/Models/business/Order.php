<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'order_customer_id',
        'order_busines_id',
        'order_orderItem',
        'order_total',
        'order_status',
      
        
       
    ];
    
     public function business(){
             return $this->belongsTo(Business::class);
        }

     public function item(){
        return $this->hasMany(OrderItem::class);
     }

        public function customer(){
        return $this->hasMany(OrderItem::class);
     }


     
}