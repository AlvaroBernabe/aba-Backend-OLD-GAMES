<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_image')->nullable(true);
            $table->string('name')->unique()->nullable(false);
            $table->string('description')->nullable(false);
            $table->integer('score')->nullable(true);
            $table->string('genre')->nullable(false);
            $table->string('publisher')->nullable(false);
            $table->date('release_date')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
