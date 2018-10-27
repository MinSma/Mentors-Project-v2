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
            $table->integer('age');
            $table->string('city');
            $table->string('topic');
            $table->double('fixed_hour_price');
            $table->double('rating')->nullable();
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
