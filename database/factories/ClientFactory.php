<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
      'name'           => $faker->name,
      'lastname'       => $faker->lastname,
      'year_birth'     => $faker->dateTimeBetween('now', '+30 years'),
      'phone'          => $faker->phoneNumber,
      'email'          => $faker->unique()->email
    ];
});
