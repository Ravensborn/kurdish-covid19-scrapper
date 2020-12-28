<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorldStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('world_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable();
            $table->string('position')->nullable();
            $table->string('total_cases')->nullable();
            $table->string('new_cases')->nullable();
            $table->string('total_deaths')->nullable();
            $table->string('new_deaths')->nullable();
            $table->string('total_recovered')->nullable();
            $table->string('new_recovered')->nullable();
            $table->string('active_cases')->nullable()->nullable();
            $table->string('serious_cases')->nullable();
            $table->string('cases_per_million')->nullable();
            $table->string('deaths_per_million')->nullable();
            $table->string('total_tests')->nullable();
            $table->string('tests_per_million')->nullable();
            $table->string('population')->nullable();
            $table->date('created_at')->default(\Carbon\Carbon::today());
            $table->date('updated_at')->default(\Carbon\Carbon::today());
            //$table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('world_statistics');
    }
}
