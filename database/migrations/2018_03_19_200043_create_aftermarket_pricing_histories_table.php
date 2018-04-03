<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAftermarketPricingHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aftermarket_pricing_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aftermarket_id')->unsigned();
            $table->string('po_number');
            $table->date('pricing_date');
            $table->decimal('price', '18', 2);
            $table->string('terms');
            $table->string('delivery');
            $table->string('fpd_reference');
            $table->string('wpc_reference');
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
        Schema::dropIfExists('aftermarket_pricing_histories');
    }
}
