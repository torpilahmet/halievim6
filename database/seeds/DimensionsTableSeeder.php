<?php

use App\Model\Dimension;
use Illuminate\Database\Seeder;

class DimensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dimension::create([
            'name' => '80 x 150',
            'price' => '109.00',
        ]);
        Dimension::create([
            'name' => '80 x 200',
            'price' => '130.00',
        ]);
        Dimension::create([
            'name' => '80 x 300',
            'price' => '190.00',
        ]);
        Dimension::create([
            'name' => '100 x 150',
            'price' => '130.00',
        ]);
        Dimension::create([
            'name' => '100 x 200',
            'price' => '155.00',
        ]);
        Dimension::create([
            'name' => '100 x 300',
            'price' => '210.00',
        ]);
        Dimension::create([
            'name' => '120 x 180',
            'price' => '189.00',
        ]);
        Dimension::create([
            'name' => '120 x 300',
            'price' => '299.00',
        ]);
        Dimension::create([
            'name' => '130 x 190',
            'price' => '190.00',
        ]);
        Dimension::create([
            'name' => '140 x 200 ',
            'price' => '230.00',
        ]);
        Dimension::create([
            'name' => '160 x 230',
            'price' => '269.00',
        ]);
        Dimension::create([
            'name' => '180 x 280',
            'price' => '369.00',
        ]);
        Dimension::create([
            'name' => '160 x 230 Oval',
            'price' => '269.00',
        ]);
        Dimension::create([
            'name' => '100 x 100',
            'price' => '130.00',
        ]);
        Dimension::create([
            'name' => '120 x 120',
            'price' => '145.00',
        ]);
        Dimension::create([
            'name' => '140 x 140',
            'price' => '165.00',
        ]);
        Dimension::create([
            'name' => '160 x 160',
            'price' => '210.00',
        ]);
        Dimension::create([
            'name' => '180 x 180',
            'price' => '269.00',
        ]);
    }
}
