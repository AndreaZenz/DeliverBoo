<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'restaurant_id',
        'total_price',
        'ArrayDishes',
        'client_comment',
        //'client_phone',
        'client_address',
        'client_name',
        'client_email',
        'is_payed',//probabilmente non serve

    ];

    public function Dish()
    {
        return $this->belongsToMany("App\Dish");
    }

    public function Restaurant()
    {
        return $this->belongsTo("App\Restaurant");
    }
}
