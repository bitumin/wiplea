<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('text',50);
            $table->string('curator_email');
            $table->timestamp('check_at');
            $table->string('check_token', 20)->nullable();
            $table->boolean('check')->nullable()->default(NULL);
            $table->boolean('check_email_sent')->default(false);


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
        Schema::drop('goals');
    }
}
