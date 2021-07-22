<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = [
        'name', 
        'address',
        'img_url', 
        'user_id',
    ];

    public function Type()
    {
        return $this->belongsToMany("App\Type");
    }

    public function User()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function Dish() 
    {
        return $this->hasMany("App\Dish");
    }

    public function Order() {
        return $this->hasMany("App\Order");
    }
}
