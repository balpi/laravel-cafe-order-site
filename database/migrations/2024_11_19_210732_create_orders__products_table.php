<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders__products', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('User_ID');
            $table->foreign('User_ID')
                ->references('ID')
                ->on('users');
            $table->unsignedBigInteger('Product_ID');
            $table->foreign('Product_ID')
                ->references('ID')
                ->on('products');

            $table->unsignedBigInteger('Order_ID');
            $table->foreign('Order_ID')
                ->references('ID')
                ->on('orders');

            $table->decimal('Price');
            $table->integer('Amount');
            $table->decimal('Total');
            $table->smallInteger('Status');
            $table->string('Note');
            $table->string('IP');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders__products');
    }
};
