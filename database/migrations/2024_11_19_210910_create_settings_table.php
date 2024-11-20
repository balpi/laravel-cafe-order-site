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
            $table->string('Title');
            $table->string('Keywords');
            $table->string('Description');
            $table->string('Company');
            $table->string('Adress');
            $table->string('Phone');
            $table->string('Email');
            $table->string('SmtpServer');
            $table->string('SmtpEmail');
            $table->string('SmtpPassword');
            $table->string('SmtpPort');
            $table->string('Facebook');
            $table->string('Instagram');
            $table->string('X');
            $table->text('AboutUs');
            $table->text('Contact');
            $table->text('References');

            $table->boolean('Status');

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
