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
            $table->text('content');
            $table->string('image', 255)->nullable();
            $table->text('day')->nullable();
            $table->decimal('price')->nullable();
            $table->string('place');
            $table->string('others');
            $table->string('genre_japan_activity', 50);
            $table->string('genre_local_event', 50);
            $table->string('genre_others', 50);
            $table->string('genre_hotel_info', 50);
            $table->timestamps();

            // 外部キー制約の追加
            $table->foreign('user_id')->references('id')->on('users');
            // usersテーブルが存在しない場合、外部キー制約はエラーとなる可能性があるため、必要に応じてコメントアウトしてください。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('your_table_name');
    }
};




