<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->integer('platform_id');
            $table->text('product_code')->nullable();
            $table->text('receipt')->nullable();
            $table->dateTime('expires_date')->nullable();
            $table->text('signature')->nullable();
            $table->text('order_id')->nullable();
            $table->text('json_data')->nullable();
            $table->text('transaction_id')->nullable();
            $table->integer('propaty_code')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
