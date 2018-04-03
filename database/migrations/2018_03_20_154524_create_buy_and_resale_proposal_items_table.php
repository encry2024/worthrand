<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyAndResaleProposalItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_and_resale_proposal_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buy_and_resale_proposal_id')->unsigned();
            $table->integer('buy_and_resale_proposal_itemmable_id')->unsigned();
            $table->string('buy_and_resale_proposal_itemmable_type');
            $table->integer('quantity')->default(0);
            $table->decimal('price', '22', 2)->default('0.00');
            $table->string('currency')->default('PHP');
            $table->string('delivery');
            $table->string('status')->default('PENDING');
            $table->string('notify_me_after');
            $table->date('notification_date');
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
        Schema::dropIfExists('buy_and_resale_proposal_items');
    }
}
