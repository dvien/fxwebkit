<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsMassTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_mass_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject', 255)->nullable();
            $table->text('mail');
            $table->integer('group_id');
            $table->char('language', 3)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings_mass_templates');

    }
}
