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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('User_ID');
            $table->foreign('User_ID')
                ->references('id')->on('users');
            $table->integer('TableNo');
            $table->decimal('Total');
            $table->string('Status', 10);
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

        Schema::dropIfExists('orders');

    }
};
