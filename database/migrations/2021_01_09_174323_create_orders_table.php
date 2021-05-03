<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderno')->unique();
            $table->longText('order_items');
            $table->decimal('totadl_amount');
            $table->integer('order_qty');
            $table->decimal('delivery_charge');
            $table->string('collectionmode')->default('PICKUP');
            $table->bigInteger('shipping_details_id')->unsigned();
            $table->foreign('shipping_details_id')->references('id')->on('shipping_details');
            $table->integer('status')->default(0); //0=pending, 1=confirmed, 2=shipped 3=delivered
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('paymentmode')->nullable();
            $table->string('paymentinfo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}