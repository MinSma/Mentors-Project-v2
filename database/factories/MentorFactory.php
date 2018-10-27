<?php
declare(strict_types = 1);

use Faker\Generator as Faker;

$factory->define(App\Models\Mentor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->randomElement(array(
            'vyras',
            'moteris'
        )),
        'age' =>$faker->numberBetween(16, 75),
        'city' => $faker->city,
        'topic' => $faker->randomElement(array(
            'Matematika',
            'Lietuviu kalba',
            'Anglu kalba',
            'Informacines technologijos',
            'Fizika',
            'Chemija',
            'Geografija',
            'Biologija',
            'Istorija'
        )),

        'fixed_hour_price' => $faker->randomFloat(4, 4.0, 50.0),
        'rating' => $faker->numberBetween(0, 0),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
