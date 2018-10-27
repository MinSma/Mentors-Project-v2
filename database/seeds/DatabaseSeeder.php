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
        factory(App\User::class, 50)->create();
        factory(App\Models\Mentor::class, 50)->create();
        factory(App\Models\Student::class, 50)->create();
    }
}
