<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsArticlesLanguagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_articles_languages', function(Blueprint $table)
        {
            $table->increments('id');
            
$table->integer('cms_articles_id')->unsigned();
$table->integer('cms_languages_id')->unsigned();
$table->string('title',255);
$table->text('body');


            $table->foreign('cms_articles_id')
                    ->references('id')->on('cms_articles')
                    ->onDelete('cascade');
            
            $table->foreign('cms_languages_id')
                    ->references('id')->on('cms_languages')
                    ->onDelete('cascade');
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
        Schema::drop('cms_articles_languages');
    }

}
