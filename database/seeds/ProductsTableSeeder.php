<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(
            [
                'name'=>'Weavon',
                'price' => 10000
            ],
            [
                'name'=>'Waist trainer',
                'price' => 4500
            ],
            [
                'name'=>'Ear Piece',
                'price' => 500
            ],
            [
                'name'=>'Snickers',
                'price' => 15000
            ]
        );
    }
}
