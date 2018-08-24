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
        $consignee = \App\Consignee::pluck('id');
		$payment_mode = array('Credit', 'Cash');

        factory(App\Courier::class, 10)->create([
        	'payment_mode' => $payment_mode[rand(0,1)]
        ])->each(function ($u){
            $u->product()->attach(\App\Product::all(), ['quantity' => rand(1,10)]);
        });
    }
}
