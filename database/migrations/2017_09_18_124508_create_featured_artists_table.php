<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturedArtistsTable extends Migration
{
    public function up()
    {
        Schema::create('featured_artists', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->text('questions')->nullable();
            $table->text('biography')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('featured_artists');
    }
}
