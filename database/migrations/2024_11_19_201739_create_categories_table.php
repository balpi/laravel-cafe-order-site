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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('ID')->autoIncrement();
            $table->string('Title');
            $table->string('Keywords');
            $table->string('Description');
            $table->string('Image');
            $table->boolean('Status');

            //$table->unsignedInteger('maincategories_ID');
            $table->foreignId('maincategories_ID')->constrained('maincategories')->references('ID');
            //$table->foreign('maincategories_ID')
            // ->references('id')
            // ->on('maincategories');


            //$table->foreign('maincategory_ID')->references('ID')->on('maincategory');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
