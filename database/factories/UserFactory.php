<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(array(
            'vyras',
            'moteris'
        )),
        'city' => $faker->city,
        'address' => $faker->address,
        'birthday' => $faker->date('Y-m-d'),
        'role' => $faker->randomElement(array(
            'payment_admin',
            'reservation_admin',
            'sys_admin'
        )),
        'phone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});
