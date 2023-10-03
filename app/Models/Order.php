<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable =[
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
    public function Products(){
        return $this->belongsToMany(Product::class,"order_products")->withPivot(["qty","price"]);
    }
}
