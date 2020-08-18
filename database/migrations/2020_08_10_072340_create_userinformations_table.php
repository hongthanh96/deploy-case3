<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('userinformations', function (Blueprint $table) {
            $table->id();
            $table->integer('gender')->nullable();
            $table->date('DOB')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->longText('image')->nullable();
            $table->integer('block')->default('0');
            $table->integer('role')->default('0');
            $table->softDeletes();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
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
        Schema::dropIfExists('userinformations');
        Schema::enableForeignKeyConstraints();
    }
}
