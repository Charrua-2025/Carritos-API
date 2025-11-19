<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = [
        'product_user_id',
        'product_category',
        'product_name',
        'product_description',
        'product_price',
        'product_image',
        'product_in_stock',
        'product_status',
        'product_extra',
        
   ];

    public function business()
    {
         return $this->belongsTo(User::class);
    }


      public function category()
    {
         return $this->belongsTo(Category::class);
    }


     public function OrderItems()
    {
         return $this->belongsTo(orderItem::class);
    }

   
}