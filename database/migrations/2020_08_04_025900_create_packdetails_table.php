<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('packdetails', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('price');
            $table->string('service1');
            $table->string('service2');
            $table->string('service3')->nullable();
            $table->string('service4')->nullable();
            $table->string('service5')->nullable();
            // $table->bigInteger('packlist_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            // $table->foreign('packlist_id')->references('id')->on('packlists');
        });
        // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('packdetails');
    }
}
