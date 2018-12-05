<?php
declare(strict_types = 1);

use Faker\Generator as Faker;

$factory->define(App\Models\Appointment::class, function (Faker $faker) {
    return [
        'date' => $faker->date('Y-m-d'),
        'time' => $faker->time('H:i:s'),
        'duration' => $faker->numberBetween(1, 10),
        'price' => $faker->numberBetween(5, 30),
        'type' => $faker->randomElement(array(
            'Pradedantiesiems',
            'Vidutinių žinių',
            'Pažengusiems',
            'Visų Lygių'
        )),
        'resources' => 1,
        'place' => $faker->city,
        'additional_cost' => $faker->numberBetween(5, 30),
        'max_distances' => $faker->numberBetween(6, 50),
        'state' => 'free',
        'language' => 'Lietuvių',
        'additional_info' => $faker->text,
        'lesson_id' => function() {
            return factory(App\Models\Lesson::class)->create()->id;
        },
    ];
});
