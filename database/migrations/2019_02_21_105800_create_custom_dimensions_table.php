<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_dimensions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('variable')->nullable();
            $table->string('label')->nullable();
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
        Schema::dropIfExists('custom_dimensions');
    }
}
