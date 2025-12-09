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
     * Lệnh này sẽ tạo bảng products cùng với cấu trúc được định nghĩa trước đo vào trong db
     * Lệnh này sẽ chạy tất cả các bảng từ trên xuống dưới
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            //  Thiết lập khoá ngoại:
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');

            //  Bảng products có khoá ngoại là category_id, 
            //  tham chiếu đến cột id của bảng categories .
            //  Khi xóa một dòng(record có id cụ thể, ví dụ như 1) trong bảng categories, 
            //  tất cả các dòng trong bảng products có category_id tương ứng(1) sẽ bị xóa theo.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
