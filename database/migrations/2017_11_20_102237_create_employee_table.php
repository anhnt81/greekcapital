<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trans_id')->unsigned();
            $table->string('name');
            $table->string('position');
            $table->string('info');
            $table->string('image');
            $table->string('status');
            $table->string('locale')->index();
            $table->unique(['trans_id', 'locale']);
            $table->foreign('trans_id')->references('id')->on('translations')->onDelete('cascade');
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
        Schema::dropIfExists('employee');
    }
}
