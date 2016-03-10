<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('pleas_received')->unsigned()->default(0);
            $table->integer('pleas_granted')->unsigned()->default(0);
            $table->integer('pleas_non_granted')->unsigned()->default(0);

            $table->integer('religion_id')->unsigned();
            $table->foreign('religion_id')->references('id')->on('religions');

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
        Schema::drop('recipients');
    }
}
