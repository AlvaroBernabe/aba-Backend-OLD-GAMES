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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('player_score')->nullable(false);
            $table->string('player_review')->nullable(false);
            $table->boolean('favourite')->nullable(false);
            $table->unsignedBigInteger('game_id')->nullable(false);
            $table->foreign('game_id')
            ->references('id')
            ->on('games')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
    }
};
