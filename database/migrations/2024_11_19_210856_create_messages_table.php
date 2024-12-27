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
        Schema::create('messages', function (Blueprint $table) {
            $table->id('ID');
            $table->string('Name');
            $table->string('Email');
            $table->string('Phone')->nullable();
            $table->string('Subject');
            $table->longText('Message');
            $table->string('Status', 10)->default('Pending');
            $table->string('IP');
            $table->string('Note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
