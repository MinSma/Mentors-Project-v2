<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',60)->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('city');
            $table->string('address');
            $table->date('birthday');
            $table->string('role');
            $table->string('phone');
            $table->rememberToken();
            $table->timestamps();
        });

        \App\User::create([
            'email' => 'admin@email.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'gender' => 'vyras',
            'city' => 'Kaunas',
            'address' => 'Lalala 22',
            'birthday' => '2001-12-05',
            'role' => 'sys_admin',
            'phone' => '99999999',
            'remember_token' => str_random(10)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
