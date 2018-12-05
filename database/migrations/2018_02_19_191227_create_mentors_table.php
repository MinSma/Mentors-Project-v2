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
