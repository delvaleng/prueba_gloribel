<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;


$factory->define(Client::class, function (Faker $faker) {
  $dt = $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-18 years');
  $date = $dt->format("Y"); // 1994

    return [
      'name'           => $faker->name,
      'lastname'       => $faker->lastname,
      'year_birth'     => $date,
      'phone'          => $faker->phoneNumber,
      'email'          => $faker->unique()->safeEmail,
    ];
});
