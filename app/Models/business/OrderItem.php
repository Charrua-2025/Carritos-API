<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
     protected $fillable = [
        'orderItem_order_id',
        'orderItem_name',
        'orderItem_price',
        'orderItem_quantity',
        'orderItem_extra',
     
       
    ];

       public function orders()
    {
         return $this->belongsTo(Order::class);
    }

    
       public function products()
    {
         return $this->hasMany(Product::class);
    }

    
        public function order(){
        return $this->belongsTo(Order::class);
     }

    
}