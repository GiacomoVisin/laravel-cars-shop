<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i <= 7; $i++) {

            $newCustomer = new Customer();

            $newCustomer->name = $faker->name();
            $newCustomer->surname = $faker->lastName();
            $newCustomer->year_of_birth = $faker->date('Y-m-d');
            $newCustomer->country = $faker->country();
            $newCustomer->phone_number = $faker->phoneNumber();

            $newCustomer->save();
        }

    }
}
