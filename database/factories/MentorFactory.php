<?php
declare(strict_types = 1);

use Faker\Generator as Faker;

$factory->define(App\Models\Mentor::class, function (Faker $faker) {
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
        'about' => $faker->text,
        'phone' => $faker->phoneNumber,
        'rating' => $faker->numberBetween(0, 0),
        'bank_accounts_id' => function() {
            return factory(App\Models\BankAccount::class)->create()->id;
        },
        'remember_token' => str_random(10),
    ];
});
