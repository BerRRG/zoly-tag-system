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
            $table->enum(
                'scope',
                [
                    '-',
                    'hit',
                    'session',
                    'user',
                    'e_commerce',
                ]
            )->default('-');
            $table->enum(
                'status',
                [
                    'done',
                    'to_do_tagging',
                    'to_do_config',
                    'validate',
                    'adjust',
                    'revalidate',
                    'not_apply',
                ]
            )->default('done');
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
