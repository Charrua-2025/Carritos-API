<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Business extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'business_user_id',
        'business_name',
        'business_open',
        'business_close',
        'business_image',
        'business_delivery',
        'business_status'
    ];

    public function user()
    {
         return $this->belongsTo(User::class);
    }

     public function phones()
    {
        return $this->hasMany(Phone::class);
    }

     public function address()
    {
        return $this->hasOne(Address::class);
    }

     public function menu()
    {
        return $this->hasOne(Menu::class);
    }

     public function products()
    {
        return $this->hasMany(Product::class);
    }

      public function orders()
    {
        return $this->hasMany(Order::class);
    }

    

}