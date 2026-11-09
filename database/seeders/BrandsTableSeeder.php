<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $brands = config('brands');

        foreach ($brands as $brand) {
            $newBrand = new Brand();

            $newBrand->name = $brand['name'];
            $newBrand->description = $brand['description'];

            $newBrand->save();
        }
    }
}
