<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->string('name_kz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ru')->nullable();
            $table->string('composition_kz')->nullable();
            $table->string('composition_en')->nullable();
            $table->string('composition_ru')->nullable();
        });
    }

    public function down()
    {
        Schema::table('food', function (Blueprint $table) {
            $table->dropColumn('name_kz');
            $table->dropColumn('name_en');
            $table->dropColumn('name_ru');
            $table->dropColumn('composition_kz');
            $table->dropColumn('composition_en');
            $table->dropColumn('composition_ru');
        });
    }
};
