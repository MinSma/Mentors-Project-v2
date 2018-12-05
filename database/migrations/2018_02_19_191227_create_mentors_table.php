<?php
declare(strict_types = 1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMentorsTable
 */
class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',60)->unique();
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('city');
            $table->string('address');
            $table->date('birthday');
            $table->string('about');
            $table->string('phone');
            $table->integer('blockings_id')->unsigned()->nullable();
            $table->integer('bank_accounts_id')->unsigned();
            $table->double('rating')->unsigned();
            $table->foreign('blockings_id')->references('id')->on('blockings');
            $table->foreign('bank_accounts_id')->references('id')->on('bank_accounts');
            $table->rememberToken();
            $table->timestamps();
        });

        \App\Models\Mentor::create([
            'email' => 'mentor@email.com',
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'first_name' => 'Mentorius',
            'last_name' => 'Mentorius',
            'gender' => 'vyras',
            'city' => 'Kaunas',
            'address' => 'Stud g. 51',
            'birthday' => '1995-10-10',
            'about' => 'Tuscia',
            'phone' => '86868686',
            'rating' => 0,
            'bank_accounts_id' => 1,
            'remember_token' => str_random(10),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('mentors');
    }
}
