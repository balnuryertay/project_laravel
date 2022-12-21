<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('food_user', function (Blueprint $table) {
            $table->string('status_kz')->nullable();
            $table->string('status_en')->nullable();
            $table->string('status_ru')->nullable();
        });
    }

    public function down()
    {
        Schema::table('food_user', function (Blueprint $table) {
            $table->dropColumn('status_kz');
            $table->dropColumn('status_en');
            $table->dropColumn('status_ru');
        });
    }
};
