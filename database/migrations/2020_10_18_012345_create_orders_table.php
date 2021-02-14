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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->decimal('total_price',10,2)->nullable();
            $table->integer('status')->default(1);
            $table->integer('payment_method')->default(1); // 1: Banka Havalesi | 2: Kapıda Ödeme
            $table->integer('invoice_method')->default(); // Kargo ve fatura bilgileri aynı ise 1 farklı ise 2

            $table->string('session_id');

            $table->string('cargo_name');
            $table->string('cargo_address');
            $table->string('cargo_phone');

            $table->string('invoice_name')->nullable();
            $table->string('invoice_address')->nullable();
            $table->string('invoice_tax_office')->nullable();
            $table->string('invoice_tax_no');

            $table->timestamps();

            $table->unique('cart_id');
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
