<?php
declare(strict_types = 1);

use Faker\Generator as Faker;

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(array(
            'vyras',
            'moteris'
        )),
        'age' => $faker->numberBetween(6, 100),
        'city' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});