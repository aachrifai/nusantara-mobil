<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('car_specs', function (Blueprint $table) {
        $table->id();
        $table->string('model_name')->unique();
        $table->json('transmisi_options'); // Kita simpan array sebagai JSON
        $table->json('fuel_options');      // Kita simpan array sebagai JSON
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_specs');
    }
};
