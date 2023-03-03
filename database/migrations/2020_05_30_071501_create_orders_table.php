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
            $table->bigIncrements('order_id')->start_from(100000);
            //$table->increments('id')->start_from(140000);
            $table->string('invoice_no',50);
            $table->unsignedInteger('user_id');
            $table->decimal('total_amount', 8, 2)->nullable();
            $table->string('order_status',50);
            $table->string('payment_status',50);
            $table->longText('payment_info')->nullable();
            $table->longText('notes')->nullable();
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
