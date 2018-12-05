<?php
declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudentsTable
 */
class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',60)->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('city');
            $table->string('address');
            $table->date('birthday');
            $table->string('education');
            $table->string('phone');
            $table->integer('blockings_id')->unsigned()->nullable();
            $table->integer('bank_accounts_id')->unsigned();
            $table->foreign('blockings_id')->references('id')->on('blockings');
            $table->foreign('bank_accounts_id')->references('id')->on('bank_accounts');
            $table->rememberToken();
            $table->timestamps();
        });

        \App\Models\Student::create([
            'email' => 'student@email.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'first_name' => 'Studentas',
            'last_name' => 'Studentas',
            'gender' => 'vyras',
            'city' => 'Kaunas',
            'address' => 'Stud g. 51',
            'birthday' => '1994-05-05',
            'education' => 'aukstasis',
            'phone' => '86868686',
            'bank_accounts_id' => 2,
            'remember_token' => str_random(10)
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('students');
    }
}
