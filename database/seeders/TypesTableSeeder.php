<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = config('types');

        foreach ($types as $type) {

            $newType = new Type();

            $newType->name = $type['name'];
            $newType->description = $type['description'];

            $newType->save();
        }
    }
}
