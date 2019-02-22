<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagBookWebAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_book_web_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('priority')->nullable();
            $table->string('reference_link_page')->nullable();
            $table->string('description_when')->nullable();
            $table->string('description_where')->nullable();
            $table->string('description_button')->nullable();
            $table->enum(
                'data_layer_data_attribute',
                [
                    'dataLayer',
                    'dataAttribute',
                    'enhancedECommerceDataAttribute',
                    'enhancedECommerceDataLayer',
                ]
            )->default('dataLayer');
            $table->string('data_layer_event')->nullable();
            $table->enum(
                'status_implementation_data_layer_data_attribute',
                [
                    'done',
                    'to_do',
                    'validate',
                    'adjust',
                    'revalidate',
                    'not_apply',
                ]
            )->default('done');
            $table->enum(
                'status_implementation_tag_manager',
                [
                    'done',
                    'to_do',
                    'validate',
                    'adjust',
                    'revalidate',
                    'not_apply',
                ]
            )->default('done');
            $table->enum(
                'status_google_analytics',
                [
                    'done',
                    'to_do',
                    'validate',
                    'adjust',
                    'revalidate',
                    'not_apply',
                ]
            )->default('done');
            $table->enum(
                'track_type',
                [
                    '-',
                    'custom_html',
                    'event',
                    'exception',
                    'pageview',
                    'social',
                    'timing',
                    'transaction',
                ]
            )->default('-');
            $table->string('tag_name')->nullable();
            $table->string('fields_to_set_no_interaction')->nullable();
            $table->enum(
                'fields_to_set_type',
                [
                    '',
                    'promoView',
                    'promoClick',
                    'detail',
                    'add',
                    'checkout',
                    'purchase',
                ]
            )->default('')->nullable();
            $table->string('fields_to_set_example')->nullable();
            $table->string('event_category')->nullable();
            $table->string('event_action')->nullable();
            $table->string('event_label_var')->nullable();
            $table->string('event_value')->nullable();
            $table->string('additional')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('tag_book_web_attributes');
    }
}
