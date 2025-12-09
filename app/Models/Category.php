<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    /**
     * Chạy lệnh sau:
     * -    php artinsa make:model Category -mfc
     *      +   m là migration
     *      +   f là factory
     *      +   c là controller    
     */

    /**
     * Thiết lập quan hệ trong Model
     */

    //  $fillable - cho phép gán hàng loạt danh sách các trường thông qua các phương thức có sẵn như update(), create(),..
    //  Nếu field nào nằm trong $fillable, thì được phép ghi mass-asignment nhưng không được Eloquent bảo vệ
    //  Ngược lại, nếu field nào không được liệt kê trong fillable, sẽ không được phép ghi mass-asignment nữa và sẽ được eloquent bảo vệ.
    protected $fillable = [
        'name' // trường nam được phép mass-asignment
    ];

    /**
     * Định nghĩa quan hệ 1 - N (One to Many) hay 1 - Nhiều
     * Ví dụ: 1 Category có nhiều Product
     */
    public function products() {
        return $this->hasMany(Product::class);
    }
}
