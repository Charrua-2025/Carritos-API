<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
     protected $fillable = [
        'phone_business_id',
        'phone_prefix',
        'phone_number',
        
        ];

        public function business(){
             return $this->belongsTo(Business::class);
        }

        
}