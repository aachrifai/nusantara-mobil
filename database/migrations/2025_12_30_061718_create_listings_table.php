<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('listings', function (Blueprint $table) {
        $table->id();
        $table->string('title');        // Contoh: "Toyota Fortuner VRZ 2021"
        $table->string('brand');        // Toyota
        $table->decimal('price', 15, 2); // Harga Jual Dealer
        $table->integer('year');
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->enum('status', ['Tersedia', 'Terjual'])->default('Tersedia');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
