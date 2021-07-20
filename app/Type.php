<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function Restaurant()
    {
        return $this->belongsToMany("App\Restaurant");
    }
}
