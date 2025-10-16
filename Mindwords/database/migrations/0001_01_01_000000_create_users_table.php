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

            // Thông tin cơ bản
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Thông tin mở rộng
            $table->string('avatar')->nullable(); // Ảnh đại diện
            $table->enum('role', ['user', 'admin'])->default('user'); // Phân quyền
            $table->text('bio')->nullable(); // Mô tả ngắn về bản thân
            $table->string('learning_goal')->nullable(); // Mục tiêu học tập
            $table->integer('points')->default(0); // Điểm thưởng
            $table->integer('streak_days')->default(0); // Số ngày học liên tục

            // Cuối cùng mới đến timestamps
            $table->timestamps();
        });

        // Bảng reset mật khẩu
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Bảng lưu phiên đăng nhập
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
