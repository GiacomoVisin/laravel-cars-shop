<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function Type()
    {
        return $this->belongsTo(Type::class);
    }


    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function Customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
