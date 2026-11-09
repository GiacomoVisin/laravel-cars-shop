<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function Type(){
        return $this->belongsTo(Car::class);
    }
}
