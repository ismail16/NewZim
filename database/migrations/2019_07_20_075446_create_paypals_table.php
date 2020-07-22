<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaypalsTable extends Migration
{

    public function up()
    {
        Schema::create('paypals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('paper_id');
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('billing_name');
            $table->string('email');
            $table->string('billing_country_code');
            $table->string('amount');
            $table->string('currency');
            $table->string('shipping_name');
            $table->string('shipping_address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal');
            $table->string('shipping_country_code');
            $table->boolean('publish')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('paypals');
    }
}
