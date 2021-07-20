<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function Type()
    {
        return $this->belongsToMany("App\Type");
    }
}
