<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ga_elements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('index')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('format_example')->nullable();
            $table->string('scope')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->string('section')->nullable();
            $table->integer('order')->nullable();
            $table->integer('tag_book_id')->unsigned()->nullable();
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
        Schema::dropIfExists('ga_elements');
    }
}
