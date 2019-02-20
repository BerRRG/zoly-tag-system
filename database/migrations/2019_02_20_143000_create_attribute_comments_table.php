<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('variable')->nullable();
            $table->string('example')->nullable();
            $table->string('description')->nullable();
            $table->string('note')->nullable();
            $table->integer('order')->nullable();
            $table->integer('tag_book_web_attribute_id')->unsigned()->nullable();
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
        Schema::dropIfExists('attribute_comments');
    }
}
