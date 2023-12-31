<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected $fillable=[
        "name",
        "slug",
        "price",
        "thumbnail",
        "description",
        "qty",
        "category_id"
    ];
    public function Category(){ // model relationship
        return $this->belongsTo(Category::class);
    }
    public function Orders(){
        return $this->belongsToMany(Order::class,"order_products");
    }
}
