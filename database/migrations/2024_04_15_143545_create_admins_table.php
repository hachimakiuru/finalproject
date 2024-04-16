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
        Schema::create('admins', function (Blueprint $table) {
            $table->string('admin_id', 50)->primary();
            $table->unsignedBigInteger('user_id'); // usersテーブルのid列を参照する外部キー
            $table->string('password', 255);
            $table->string('name', 100);
            $table->string('employee_number', 20);
            $table->timestamps();
            
            // 外部キー制約の追加
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            // 外部キー制約の削除
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('admins');
    }
};

