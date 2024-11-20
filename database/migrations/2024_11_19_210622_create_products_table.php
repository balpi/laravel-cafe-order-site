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
        Schema::create('products', function (Blueprint $table) {
            $table->id('ID')->autoIncrement()->primary();
            $table->string('Title');
            $table->string('Keywords');
            $table->string('Description');
            $table->string('Image');
            $table->integer('Category_ID');

            $table->foreign('Category_ID')->references('ID')->on('categories');
            $table->text('Detail');
            $table->decimal('Price');
            $table->unsignedBigInteger('User_ID');
            $table->foreign('User_ID')
                ->references('ID')
                ->on('users');
            $table->boolean('Status');
            //$table->timestamp('CreateDate')->nullable();
            //$table->timestamp('UpdateDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
