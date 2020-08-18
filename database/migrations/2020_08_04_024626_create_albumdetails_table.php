<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('albumdetails', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('description');
            $table->integer('isHot')->default('0');
            $table->string('image');
            $table->string('filename');
            $table->bigInteger('album_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('album_id')->references('id')->on('albums');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('albumdetails');
        Schema::enableForeignKeyConstraints();
    }
}
