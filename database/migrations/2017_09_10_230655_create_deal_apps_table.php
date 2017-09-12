<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deal_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('d_id')->nullable();
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('gender');
            $table->dateTime('dob');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
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
        Schema::dropIfExists('deal_apps');
    }
}
