<?php

use App\Model\Product;
use Illuminate\Database\Seeder;
use Intervention\Image\Facades\Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<10; $i++) {
            Product::create([
                'sku' => $sku =$faker->numerify('TD ###-##'),
                'image' => 'http://via.placeholder.com/800x600?text='.$sku,

            ]);
        }
    }
}
