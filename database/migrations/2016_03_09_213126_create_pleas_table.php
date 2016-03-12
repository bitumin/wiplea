<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePleasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pleas', function (Blueprint $table) {
            $table->increments('id');

            $table->text('text');
            $table->boolean('success')->nullable()->default(NULL);
            $table->boolean('is_public')->default(false);

            $table->integer('goal_id')->unsigned();
            $table->foreign('goal_id')->references('id')->on('goals');
            $table->integer('recipient_id')->unsigned();
            $table->foreign('recipient_id')->references('id')->on('recipients');

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
        Schema::drop('pleas');
    }
}
