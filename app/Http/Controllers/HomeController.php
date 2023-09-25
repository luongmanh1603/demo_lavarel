<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function home(){
        $products = Product::where("qty",">",30)
            ->where("price",">",500)
            ->orderBy("create_at","desc")
            ->limit(12)
            ->get();
        return view("pages.home",compact("products"));

    }
    public function test(){
        return view("layouts.app");
    }
}
