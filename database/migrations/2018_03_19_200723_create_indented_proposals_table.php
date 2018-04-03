<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndentedProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indented_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('status', 15);
            $table->string('collection_status', 20);
            $table->string('purchase_order', 20)->nullable();
            $table->string('rfq_number', 20)->nullable();
            $table->string('wpc_reference', 30)->nullable();
            $table->string('invoice_to', 50);
            $table->string('invoice_to_address', 100);
            $table->string('ship_to', 50);
            $table->string('ship_to_address', 100);
            $table->string('wpcoc', 50)->nullable();
            $table->string('order_entry_no', 30)->nullable();
            $table->string('ship_via', 30)->nullable();
            $table->string('amount', 100)->nullable();
            $table->string('insurance', 100)->nullable();
            $table->string('bank_detail_name', 30)->nullable();
            $table->string('bank_detail_address', 100)->nullable();
            $table->string('bank_detail_account_no', 20)->nullable();
            $table->string('bank_detail_swift_code', 20)->nullable();
            $table->string('bank_detail_account_name', 30)->nullable();
            $table->string('terms_of_payment_1', 30)->nullable();
            $table->string('terms_of_payment_address', 100)->nullable();
            $table->string('documents', 100)->nullable();
            $table->string('special_instruction', 100)->nullable();
            $table->string('packing', 50)->nullable();
            $table->string('commission_note')->nullable();
            $table->string('commission_address', 100)->nullable();
            $table->string('commission_account_number', 20)->nullable();
            $table->string('commission_swift_code', 20)->nullable();
            $table->string('file_name')->nullable();
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
        Schema::dropIfExists('indented_proposals');
    }
}
