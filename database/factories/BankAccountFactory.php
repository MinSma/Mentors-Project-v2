<?php
declare(strict_types = 1);

use Faker\Generator as Faker;

$factory->define(App\Models\BankAccount::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(0, 0),
        'askings' => $faker->numberBetween(0, 0)
    ];
});
