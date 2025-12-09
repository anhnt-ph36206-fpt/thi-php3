<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Sau khi định nghĩa cấu trúc bảng xong thì chạy lệnh:
     * -    php artisan migrate
     * Lệnh này sẽ tạo bảng categories cùng với cấu trúc được định nghĩa trước đo vào trong db
     * Lệnh này sẽ chạy tất cả các bảng từ trên xuống dưới
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
