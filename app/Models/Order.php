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
        "status",
        "tel",
        "address",
        "full_name",
        "shipping_method",
        "payment_method",
        "is_paid"
    ];
}
