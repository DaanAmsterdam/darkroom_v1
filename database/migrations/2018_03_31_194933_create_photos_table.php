<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('collection_id');
            $table->string('title'); // maybe subtitle??
            $table->text('body');

            $table->timestamp('shot_at'); // maybe dateTime ? check exif data..
            $table->string('camera');
            $table->string('lens');
            $table->string('shutterspeed');
            $table->string('aperture');
            $table->integer('iso');
            $table->string('focallength');

            $table->string('location'); // text or gps
            $table->text('keywords');
            $table->string('filename');

            // size_type, landscape(boolean), crop_slice(1.2.3)

            $table->integer('views');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
