<?php

use Faker\Generator as Faker;

$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'display_name' => $faker->name,
        'company_name' => $faker->name,
        'description' => $faker->text,
        'address_street_1' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip_code' => $faker->numberBetween($min = 1000, $max = 9000),
        'country' => $faker->country,
        'phone_1' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'website' => $faker->domainName,
        'instagram' => $faker->userName,
        'twitter' => $faker->userName,
        'linkedln_profile' => $faker->userName,
        'background_info' => $faker->text,
        'sales_rep' => $faker->name,
        'rating' => $faker->name,
        'project_type' => $faker->name,
        'project_description' => $faker->text,
        'budget' => $faker->randomFloat,
        'deliverable' => $faker->text,
        'proposal_due_date' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
