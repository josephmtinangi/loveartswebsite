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

            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();

            $table->string('avatar')->default('la_def_avatar.jpg');
            $table->string('art_quote')->nullable();
            $table->string('simple_description')->nullable();

            $table->text('description')->nullable();
            $table->text('video_url')->nullable(); //e.g. youtube video
            $table->text('portrait_url')->nullable(); //e.g. soundcloud playlist, 'image'

            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->unique()->nullable();
            $table->string('verification_token')->nullable();

            $table->rememberToken();

            $table->date('dob')->nullable();
            $table->timestamps();

            $table->integer('role')->default(0);
            $table->integer('pillar_id')->unsigned()->default(1);
        });
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
