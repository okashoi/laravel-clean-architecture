<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskStartDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_start_dates', function (Blueprint $table) {
            $table->bigInteger('task_id')->primary()->unsigned();
            $table->date('start_date');
            $table->timestamps();

            $table->foreign('task_id')
                ->references('task_id')
                ->on('estimated_times')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_start_dates');
    }
}
