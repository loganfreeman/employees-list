<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Employee::class, function (Faker $faker) {
  $first_name = $faker->firstName;
  $last_name = $faker->lastName;
  $slug = str_slug($first_name . $last_name);
	return [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'slug' =>  $slug,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'salary' => $faker->numberBetween($min = 1000, $max = 9000),
        'employee_id' => $faker->uuid,
        'email' => $faker->unique()->safeEmail,
        'street' => $faker->streetAddress,
		'state' => $faker->state,
		'city' => $faker->city,
		'country' => $faker->country,
    ];
});
