<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestChangePasswordTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_change_password', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('login');
            $table->string('newPassword', 100);
            $table->text('comment');
            $table->text('reason');
            $table->tinyInteger('status');
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
        Schema::drop('request_change_password');
    }

}