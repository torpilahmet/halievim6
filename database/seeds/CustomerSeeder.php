<?php

use App\Model\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('tr_TR');

        for($i=0; $i<10; $i++) {
            Customer::create([
                'name' => $faker-> name(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'tc' => $faker->tcNo(),
            ]);
        }
    }
}
