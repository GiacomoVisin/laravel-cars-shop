<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

protected $fillable = [
        'name',
        'km',
        'price',
        'registration_date',
        'description',
        'img',
        'brand_id',
        'type_id',
        'customer_id',
    ];
    public function Type()
    {
        return $this->belongsTo(Type::class);
    }


    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function customer()
    {   
        return $this->belongsToMany(Customer::class);
    }
}
