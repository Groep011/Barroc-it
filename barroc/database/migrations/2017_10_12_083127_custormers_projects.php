<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustormersProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custormers_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custormer_id' , 0)->unsigned();
            $table->integer('project_id', 0)->unsigned();
            $table->timestamps();

            $table->foreign('custormer_id')->references('id')->on('custormers');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custormers_projects');
    }
}
