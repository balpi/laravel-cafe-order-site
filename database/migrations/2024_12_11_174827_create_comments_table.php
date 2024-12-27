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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('ID');
            $table->string('comment');
            $table->string('rate');
            $table->unsignedBigInteger('product_ID');
            $table->foreign('product_ID')
                ->references('ID')
                ->on('products');
            $table->unsignedBigInteger('user_ID');
            $table->foreign('user_ID')
                ->references('ID')
                ->on('users');
            $table->string('ip');
            $table->string('Status', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
