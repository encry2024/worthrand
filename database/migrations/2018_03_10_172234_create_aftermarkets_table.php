<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAftermarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aftermarkets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model');
            $table->string('part_number');
            $table->string('reference_number');
            $table->string('material_number');
            $table->string('serial_number');
            $table->string('tag_number');
            $table->string('ccn_number');
            $table->decimal('price', '18', 2);
            $table->string('company_name');
            $table->string('scanned_file');
            $table->text('description');
            $table->string('stock_number');
            $table->string('sap_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aftermarkets');
    }
}
