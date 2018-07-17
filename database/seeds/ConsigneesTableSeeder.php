<?php

use Illuminate\Database\Seeder;

class ConsigneesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
      factory(App\Consignee::class, 10)->create();
    }
}
