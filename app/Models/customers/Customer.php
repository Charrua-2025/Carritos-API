<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable = [
        'name',
        'email',
        'password',
    
    ];

    public function customerAddress()
    {
       return $this->HasOne(CustomerAddress::class);
    }

     public function customerPhone()
    {
       return $this->HasOne(CustomerPhones::class);
    }
    
}