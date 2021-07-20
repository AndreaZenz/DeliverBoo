<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function Dish()
    {
        return $this->belongsToMany("App\Dish");
    }

    public function Restaurant()
    {
        return $this->belongsTo("App\Restaurant");
    }
}
