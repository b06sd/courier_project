<?php

use Faker\Generator as Faker;

$factory->define(App\Courier::class, function (Faker $faker) {

    return [
        
        'name' => $faker->Company,
    	'address' => $faker->Address,
    	'phone_number' => $faker->PhoneNumber,
    	'email' => $faker->unique()->safeEmail,
    	
    	'description' => $faker->paragraph,
    	'received_by' => $faker->name,
    	'consignee_id' => function () {
    		return factory(App\Consignee::class)->create()->id;
    	},
    	'pickup_date' => $faker->date,
    	'dispatch_date' => $faker->date,
    	'delivery_date' => $faker->date,
    	
    	'amount' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
