<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   public function Car(){
    return $this->belongsToMany(Car::class);
   }
}
