<?php

use Illuminate\Database\Seeder;
use App\Sale;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
          'consignee_id' => 1,
          'courier_id' => 1,
          'product_id' => 1,
          'quantity' 2
        ]);
    }
}
