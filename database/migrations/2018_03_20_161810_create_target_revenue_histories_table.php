<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetRevenueHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_revenue_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('target_revenue_id')->unsigned();
            $table->date('date');
            $table->integer('target_revenue_historable_id')->unsigned();
            $table->string('target_revenue_historable_type');
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
        Schema::dropIfExists('target_revenue_histories');
    }
}
