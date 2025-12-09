<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    
    /**
     * Chạy lệnh sau:
     * -    php artinsa make:model Product -mfc
     *      +   m là migration
     *      +   f là factory
     *      +   c là controller    
     */
     /**
     * Thiết lập quan hệ trong Product Model
     */

    //  $fillable - cho phép gán hàng loạt danh sách các trường thông qua các phương thức có sẵn như update(), create(),..
    //  Nếu field nào nằm trong $fillable, thì được phép ghi mass-asignment nhưng không được Eloquent bảo vệ
    //  Ngược lại, nếu field nào không được liệt kê trong fillable, sẽ không được phép ghi mass-asignment nữa và sẽ được eloquent bảo vệ.
   
    /** GPT
     * $fillable cho phép gán dữ liệu hàng loạt (mass assignment)
     * Chỉ các trường được khai báo trong $fillable mới có thể ghi bằng create(), update()
     * Những trường không có trong $fillable sẽ bị Eloquent từ chối (được bảo vệ)
     */
    protected $fillable = [
        'name',
        'price',
        'category_id'
    ];

    /**
     * Định nghĩa quan hệ: N - 1 (Many To One) Nhiều - 1 
     * 
     * Một sản phẩm chỉ thuộc về một danh mục duy nhất
     * Ví dụ: N (Nhiều Product kahcs nhau) thuộc về một Category
     */

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}
