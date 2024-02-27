<?php
/**
 * File name: 2020_09_01_192732_create_slides_table.php
 * Last modified: 2020.09.12 at 20:01:58
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->unsigned()->default(0)->nullable();
            $table->string('text', 50)->nullable();
            $table->string('button', 50)->nullable();
            $table->string('text_position', 50)->default('start')->nullable();
            $table->string('text_color', 36)->nullable();
            $table->string('button_color', 36)->nullable();
            $table->string('background_color', 36)->nullable();
            $table->string('indicator_color', 36)->nullable();
            $table->string('image_fit', 50)->default('cover')->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('market_id')->unsigned()->nullable();
            $table->boolean('enabled')->default(1)->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null')->onUpdate('set null');
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('set null')->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slides');
    }
}
