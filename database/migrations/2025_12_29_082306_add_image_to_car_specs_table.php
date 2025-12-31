<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('car_specs', function (Blueprint $table) {
        $table->string('image')->nullable()->after('model_name');
    });
}

public function down()
{
    Schema::table('car_specs', function (Blueprint $table) {
        $table->dropColumn('image');
    });
}
};
