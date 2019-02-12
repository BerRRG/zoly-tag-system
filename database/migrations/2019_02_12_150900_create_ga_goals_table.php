<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ga_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ga_index')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('condition_rules')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('ga_goals');
    }
}
