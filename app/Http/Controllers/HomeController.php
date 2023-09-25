<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function home(){
//        $products = Product::where("qty",">",30)
//            ->where("price",">",500)
//            ->orderBy("created_at","desc")
//            ->limit(12)
//            ->get();
        $products = Product::orderBy("created_at","desc")->paginate(12);
        return view("pages.home",compact("products"));

    }
    public function category(Category $category){
        // dua vao id tim category
        // neu khong ton tai ->404

        $products = Product::where("category_id",$category->id)
            ->orderBy("created_at","desc")->paginate(12);
        return view("pages.category",compact("products"));
    }
    public function test(){
        return view("layouts.app");
    }
}
