<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('food_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->unsignedInteger('number')->default(1);
            $table->string('status')->default('ordered');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_user');
    }
};
