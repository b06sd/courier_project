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
//        $product = \App\Product::pluck('id');
        $consignee = \App\Consignee::pluck('id');
		$payment_mode = array('Credit', 'Cash');
		$random = rand(0,1);

        factory(App\Courier::class, 10)->create([
        	'payment_mode' => $payment_mode[$random],
            'consignee_id' => $consignee[$random]
        ])->each(function ($u){

            $u->product()->attach(\App\Product::all(), ['quantity' => rand(0,10), 'amount' => rand(100,10000)]);
        });
    }
}
