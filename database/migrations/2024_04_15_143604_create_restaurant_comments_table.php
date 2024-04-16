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
        Schema::create('restaurant_comments', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('user_id'); // ユーザーID列の作成
            $table->unsignedBigInteger('restaurant_post_id'); // レストランポストID列の作成
            $table->text('comment')->nullable(); // コメントテキスト列の作成（null許容）
            $table->timestamps(); // 作成日時と更新日時のタイムスタンプ列の作成
            
            // 外部キー制約の追加
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('restaurant_post_id')->references('id')->on('restaurant_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_comments');
    }
};


