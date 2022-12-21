<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->string('text_kz')->nullable();
            $table->string('text_ru')->nullable();
            $table->string('text_en')->nullable();
        });
    }

    public function down()
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropColumn('text_kz');
            $table->dropColumn('text_ru');
            $table->dropColumn('text_en');
        });
    }
};
