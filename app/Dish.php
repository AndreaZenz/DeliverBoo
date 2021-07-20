<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function Order()
    {
        return $this->belongsToMany("App\Order");
    }

    public function Restaurant()
    {
        return $this->belongsTo("App\Restaurant");
    }
}
