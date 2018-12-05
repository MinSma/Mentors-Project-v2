<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Comment::class, 5)->create();
        factory(App\Models\Rating::class, 5)->create();
        factory(App\Models\Appointment::class, 5)->create();
    }
}