<?php

use Illuminate\Database\Seeder;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$product = \App\Product::all();
		$payment_mode = array('Credit', 'Cash');
		$random = rand(0,1);

        factory(App\Courier::class, 10)->create([
        	'product_id' => $product[$random],
        	'payment_mode' => $payment_mode[$random]

        ]);
    }
}
