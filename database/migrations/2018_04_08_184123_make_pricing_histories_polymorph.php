<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakePricingHistoriesPolymorph extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_number');
            $table->date('pricing_date');
            $table->string('currency');
            $table->decimal('price', '18', 2);
            $table->string('terms');
            $table->string('delivery');
            $table->string('fpd_reference');
            $table->string('wpc_reference');
            $table->integer('pricing_historable_id')->unsigned();
            $table->string('pricing_historable_type');
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
        Schema::dropIfExists('pricing_histories');
    }
}
