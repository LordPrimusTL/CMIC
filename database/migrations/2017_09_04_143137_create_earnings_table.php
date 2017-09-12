<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('t_id');//transaction id 15 digit
            $table->integer('user_id');
            $table->string('amount');
            $table->string('transaction_description');//transaction description
            $table->integer('tn_id');
            $table->integer('t_type');
            $table->integer('ts_id');//transaction status;
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
        Schema::dropIfExists('earnings');
    }
}
