<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
      protected $fillable = [
        'menu_business_id',
        'menu_items',
       
    ];

     public function business(){
             return $this->belongsTo(Business::class);
        }

       
}