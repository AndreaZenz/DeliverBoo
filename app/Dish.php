<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name', 
        'price',
        'description', 
        'visible',
        'ingredient_list',
        'img_url',
        'restaurants_id'
    ];

    public function Order()
    {
        return $this->belongsToMany("App\Order");
    }

    public function Restaurant()
    {
        return $this->belongsTo("App\Restaurant", "restaurant_id");
    }
}
