<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('project_name');
            $table->string('user_name');
            $table->string('user_mail');
            $table->string('ga_code')->nullable();
            $table->string('gtm_code')->nullable();
            $table->string('url')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_books');
    }
}
