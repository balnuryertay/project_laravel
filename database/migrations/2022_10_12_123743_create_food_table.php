<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('composition');
            $table->text('price');
            $table->foreignId('user_id')->nullable()->constrained();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('food');
    }
};
