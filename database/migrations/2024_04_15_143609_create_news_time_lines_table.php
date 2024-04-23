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
        Schema::create('news_time_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 255);
            $table->text('content')->default('');
            $table->string('image', 255)->nullable();
            $table->text('day')->nullable();
            $table->decimal('price')->nullable();
            $table->string('place')->default(''); 
            $table->string('others')->default('');
            $table->unsignedBigInteger('genre_id');
            $table->timestamps();
    
            // 外部キー制約の追加
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_time_lines');
    }
};




