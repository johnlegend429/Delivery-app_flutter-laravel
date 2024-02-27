<?php
/**
 * File name: 2020_08_23_181029_create_discountables_table.php
 * Last modified: 2020.09.12 at 20:01:58
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountablesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('discountables')) {
            Schema::create('discountables', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('coupon_id')->unsigned();
                $table->string('discountable_type', 127);
                $table->integer('discountable_id');
                $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discountables');
    }
}
