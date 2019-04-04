<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('countryId');
            $table->integer('companyId');
            $table->string('cust_name');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('d_address_1')->nullable();
            $table->string('d_address_2')->nullable();
            $table->string('d_state')->nullable();
            $table->string('d_city')->nullable();
            $table->integer('d_postal_code')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('invoice_running_no')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('discount_amount')->nullable();
            $table->string('tax')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('link')->nullable();
            $table->string('link_order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
