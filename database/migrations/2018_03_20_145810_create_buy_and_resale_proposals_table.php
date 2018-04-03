<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyAndResaleProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_and_resale_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('invoice_to', 50);
            $table->string('invoice_address', 100);
            $table->date('date');
            $table->string('wpc_reference', 30);
            $table->string('qrc_reference', 20);
            $table->string('validity', 20);
            $table->string('payment_terms', 20);
            $table->string('status', 15);
            $table->string('collection_status', 20);
            $table->string('purchase_order', 20);
            $table->string('file_name');
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
        Schema::dropIfExists('buy_and_resale_proposals');
    }
}
