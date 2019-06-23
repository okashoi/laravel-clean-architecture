<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduleds', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->unsigned();
            $table->string('name');
            $table->tinyInteger('estimated_time_hours')->unsigned();
            $table->tinyInteger('estimated_time_minutes')->unsigned();
            $table->date('start_date')->nullable();
            $table->text('note');
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
        Schema::dropIfExists('scheduleds');
    }
}
