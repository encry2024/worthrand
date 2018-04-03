<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('drawing_number');
            $table->string('bom_number');
            $table->string('end_user');
            $table->string('seal_type');
            $table->string('size');
            $table->string('material_number');
            $table->string('code');
            $table->string('model');
            $table->string('serial_number');
            $table->string('tag');
            $table->decimal('price', '18', 2);
            $table->string('scanned_file');
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
        Schema::dropIfExists('seals');
    }
}
