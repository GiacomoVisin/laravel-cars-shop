<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = config('array');

        foreach ($cars as $car) {

            $newCar = new Car();

            $newCar->name = $car['name'];
            $newCar->km = $car['km'];
            $newCar->price = $car['price'];
            $newCar->registration_date = $car['registration_date'];

            $newCar->save();
        }
    }
}
