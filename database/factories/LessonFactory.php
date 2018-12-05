<?php
declare(strict_types = 1);

use Faker\Generator as Faker;

$factory->define(App\Models\Lesson::class, function (Faker $faker) {
    return [
        'level' => $faker->randomElement(array(
            'Pradedantiesiems',
            'Vidutinių žinių',
            'Pažengusiems',
            'Visų Lygių'
        )),
        'subject' => $faker->randomElement(array(
            'Matematika',
            'Anglu kalba',
            'Informacines Technologijos',
            'Chemija',
            'Fizika',
            'Biologija',
            'Geografija',
            'Istorija'
        )),
        'description' => $faker->text,
        'qualification' => $faker->text,
        'mentor_id' => function() {
            return factory(App\Models\Mentor::class)->create()->id;
        },
    ];
});
