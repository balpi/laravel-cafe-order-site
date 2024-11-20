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
                ->references('id')->on('users')->cascadeOnDelete();
            $table->integer('TableNo');
            $table->decimal('Total');
            $table->smallInteger('Status');
            $table->string('Note');
            $table->string('IP');
            //$table->timestamp('Created_at')->nullable();
            //$table->timestamp('Updated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('orders');
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('created_at');
        });
    }
};
