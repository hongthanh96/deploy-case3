<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{

    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('albums', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('albums');
        Schema::enableForeignKeyConstraints();
    }
}
