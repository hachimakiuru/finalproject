<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // レストランを投稿したユーザーのID
            $table->string('name')->nullable(false); // レストランの名前
            $table->string('address')->nullable(false); // レストランの住所
            $table->string('open_time')->nullable(); // 営業開始時間
            $table->string('close_time')->nullable(); // 営業終了時間
            $table->string('genre_place')->nullable(); // 場所のジャンル
            $table->string('genre_variety')->nullable(); // カテゴリのジャンル
            $table->string('genre_religion')->nullable(); // 宗教のジャンル
            $table->string('genre_payment')->nullable(); // 支払い方法のジャンル
            $table->string('genre_wifi')->nullable(); // Wi-Fiのジャンル
            $table->string('image_path')->nullable(); // 画像のパス
            $table->boolean('favorite')->nullable(); // お気に入りの設定
            $table->timestamps(); // 作成日時と更新日時
        });
        
        Schema::table('restaurant_posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // ユーザーIDの外部キー制約
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_posts');
    }
};



