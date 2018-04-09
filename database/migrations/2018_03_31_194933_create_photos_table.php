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
            $table->integer('collection_id')->nullable();
            $table->string('title'); // maybe subtitle??
            $table->text('body');

            $table->timestamp('shot_at'); // maybe dateTime ? check exif data..
            $table->string('camera')->nullable();
            $table->string('lens')->nullable();
            $table->string('shutterspeed')->nullable();
            $table->string('aperture')->nullable();
            $table->integer('iso')->nullable();
            $table->string('focallength')->nullable();

            $table->string('location')->nullable(); // text or gps
            $table->text('keywords')->nullable();
            $table->string('filename')->nullable();

            // size_type, landscape(boolean), crop_slice(1.2.3)

            $table->integer('views')->default(0); // default is 0
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
