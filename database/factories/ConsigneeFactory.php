<?php

use Faker\Generator as Faker;

$factory->define(App\Consignee::class, function (Faker $faker) {
    return [

    	'name' => $faker->Company,
    	'address' => $faker->Address,
    	'phone_number' => $faker->PhoneNumber,
    	'email' => $faker->unique()->safeEmail,
    ];
});
