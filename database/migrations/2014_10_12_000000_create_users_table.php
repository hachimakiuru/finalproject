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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique()->nullable(false); // emailはNULLを許容せず、一意である必要がある
            $table->string('room_number', 255)->nullable(); // 部屋番号はNULLを許容する
            $table->timestamp('email_verified_at')->nullable(); // メール認証日時はNULLを許容する
            $table->string('password', 255);
            $table->text('memo')->nullable(); // メモはNULLを許容する
            $table->rememberToken();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['foreign_key_column_name']); // 外部キー制約を削除する
        });
        Schema::dropIfExists('users');
    }
};
