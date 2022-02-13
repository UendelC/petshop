<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->bigInteger('user_id')->references('id')->on('users');
            $table->bigInteger('order_status_id')
                ->references('id')
                ->on('order_statuses');
            $table->bigInteger('payment_id')
                ->references('id')
                ->on('payments');
            $table->uuid();
            $table->json('products');
            $table->json('address');
            $table->float('delivery_fee');
            $table->float('amount')->unique();
            $table->timestamp('shipped_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
