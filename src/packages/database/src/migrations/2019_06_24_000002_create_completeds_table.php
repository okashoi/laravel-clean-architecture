<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completeds', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->unsigned();
            $table->string('name');
            $table->tinyInteger('estimated_time_hours')->unsigned();
            $table->tinyInteger('estimated_time_minutes')->unsigned();
            $table->date('start_date');
            $table->text('note');
            $table->timestamps();

            $table->foreign('id')
                ->references('id')
                ->on('scheduleds')
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
        Schema::dropIfExists('completeds');
    }
}
