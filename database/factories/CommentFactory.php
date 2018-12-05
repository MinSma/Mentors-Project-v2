<?php
declare(strict_types = 1);

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'student_id' => function() {
            return factory(App\Models\Student::class)->create()->id;
        },
        'mentor_id' => function() {
            return factory(App\Models\Mentor::class)->create()->id;
        },
    ];
});