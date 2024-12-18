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
        Schema::create('settings', function (Blueprint $table) {
            $table->id('ID')->autoIncrement();
            $table->string('Title')->nullable();
            $table->string('Keywords')->nullable();
            $table->string('Description')->nullable();
            $table->string('Company')->nullable();
            $table->string('Adress')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->string('SmtpServer')->nullable();
            $table->string('SmtpEmail')->nullable();
            $table->string('SmtpPassword')->nullable();
            $table->string('SmtpPort')->nullable();
            $table->string('Facebook')->nullable();
            $table->string('Instagram')->nullable();
            $table->string('X')->nullable();
            $table->text('AboutUs')->nullable();
            $table->text('Contact')->nullable();
            $table->text('References')->nullable();

            $table->string('Status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
