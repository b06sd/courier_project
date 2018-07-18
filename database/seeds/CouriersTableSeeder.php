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
    	$shipping_service = array('Document', 'Parcel');
		$payment_mode = array('Credit', 'Cash');
		$random = rand(0,2);

        factory(App\Courier::class, 10)->create([

        	'shipping_service' => $shipping_service[$random],
        	'payment_mode' => $payment_mode[$random]

        ]);
    }
}
