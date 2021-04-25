<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_charts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('new_user_month');
            $table->string('access_month');
            $table->string('access_year');
            $table->string('user_year');
            $table->string('paid_fees_user_year');
            $table->string('average_duration');
            $table->softDeletes();
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
        Schema::dropIfExists('admin_charts');
    }
}
