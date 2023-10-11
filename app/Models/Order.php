<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $fillable = [
        "user_id",
        "grand_total",
        "email",
        "status",
        "tel",
        "address",
        "full_name",
        "shipping_method",
        "payment_method",
        "is_paid"
    ];
    const PENDING = 0;
    const CONFIRMED = 1;
    const SHIPPING = 2;
    const SHIPPED = 3;
    const COMPLETE = 4;
    const CANCEL = 5;

    public function Products()
    {
        return $this->belongsToMany(Product::class, "order_products")->withPivot(["qty", "price"]);
    }
 public function getGrandTotal()
{
    return "$" . number_format($this->grand_total, 2);
}

    public function getPaid()
    {
        return $this->is_paid ? "<span class='btn btn-success'>Đã thanh toán</span>"
            : "<span class='btn btn-secondary'>Chưa thanh toán</span>";
    }

    public function getStatus()
    {
        switch ($this->status) {
            case self::PENDING:
                return "<span class='text-secondary'>Chờ xác nhận</span>";
            case self::CONFIRMED:
                return "<span class='text-info'>Đã xác nhận</span>";
            case self::SHIPPING:
                return "<span class='text-warning'>Đang giao hàng</span>";
            case self::SHIPPED:
                return "<span class='text-primary'>Đã giao hàng</span>";
            case self::COMPLETE:
                return "<span class='text-success'>Hoàn thành</span>";
            case self::CANCEL:
                return "<span class='text-danger'>Huỷ</span>";
        }
    }

}
