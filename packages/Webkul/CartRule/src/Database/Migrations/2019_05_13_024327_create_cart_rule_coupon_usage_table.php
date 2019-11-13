<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartRuleCouponUsageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_rule_coupon_usage', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('usage')->unsigned()->default(0);
            $table->date('expired_on');

            $table->integer('coupon_id')->unsigned();
            $table->foreign('coupon_id')->references('id')->on('cart_rules')->onDelete('cascade');

            $table->integer('channel_id')->unsigned();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade');
            
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_rule_coupon_usage');
    }
}
