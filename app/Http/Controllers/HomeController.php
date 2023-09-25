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
    public function product(Product $product){
        $relateds = Product::where("category_id",$product->category_id)
            ->where("id","!=",$product->id)
            ->where("qty",">",0)
            ->orderBy("created_at","desc")
            ->limit(4)
            ->get();
        return view("pages.product",compact("product","relateds"));
    }
    public function addToCart(Product $product, Request $request){
        $buy_qty = $request->get("buy_qty");
        $cart = session()->has("cart")?session("cart"):[];
        foreach ($cart as $item){
            if ($item->id == $product->id){
                $item->buy_qty = $item->buy_qty + $buy_qty;
                session(["cart"=>$cart]);
                return redirect()->back()->with("success","da them san pham vao gio hang");
            }
        }
        $product->buy_qty = $buy_qty;
        $cart[] = $product;
        session(["cart"=>$cart]);
        return redirect()->back()->with("success","da them vao gio hang thanh cong");
    }
    public function cart(){
        $cart = session()->has("cart")?session("cart"):[];
        $subtotal = 0;
        $can_checkout = true;
        foreach ($cart as $item){
            $subtotal += $item->price * $item->buy_qty;
            if ($item->buy_qty > $item->qty)
                $can_checkout = false;
        }
        $total = $subtotal*1.1;
        return view("pages.cart",compact("cart","subtotal","total","can_checkout"));
    }
    public function test(){
        return view("layouts.app");
    }
}
