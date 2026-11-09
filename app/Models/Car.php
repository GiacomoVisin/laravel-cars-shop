<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function Type()
    {
        return $this->belongsTo(Type::class);
    }


    public function Brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
