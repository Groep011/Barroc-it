<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustormersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custormers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('phone_nr',255);
            $table->string('city',255);
            $table->string('street',255);
            $table->string('house_nr',255);
            $table->string('bank_acount',255);
            $table->enum('credible', ['T', 'F']);
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
        Schema::dropIfExists('custormers');
    }
}
