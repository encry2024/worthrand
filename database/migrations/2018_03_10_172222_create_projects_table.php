<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('customer_id')->unsigned();
            $table->string('name')->index();
            $table->string('source');
            $table->string('address_1');
            $table->string('contact_person_1');
            $table->string('contact_number_1');
            $table->string('email_1');

            $table->string('consultant');
            $table->string('address_2');
            $table->string('contact_person_2');
            $table->string('contact_number_2');
            $table->string('email_2');

            $table->string('status');

            $table->string('shorted_list_epc');
            $table->string('address_3');
            $table->string('contact_person_3');
            $table->string('contact_number_3');
            $table->string('email_3');

            $table->string('approved_vendors_list');
            $table->string('requirements_coor');
            $table->string('epc_award');
            $table->date('award_date');
            $table->date('implementation_date');
            $table->date('execution_date');

            $table->string('bu');
            $table->string('bu_reference');
            $table->string('wpc_reference');
            $table->string('affinity_reference');
            $table->string('value');

            $table->string('reference_number')->unique();
            $table->string('types_of_sales');
            $table->string('tag_number')->unique();
            $table->string('application')->unique();
            $table->string('pump_model');
            $table->string('serial_number')->unique();
            $table->string('competitors');
            $table->string('final_result');

            $table->string('scanned_file');
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
        Schema::dropIfExists('projects');
    }
}
