<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index() {

        $categories = Category::orderby('name', 'ASC')->get();

        $products = Product::orderby('created_at', 'DESC')->limit(10)->get();

        $sliders = Slider::orderby('created_at', 'DESC')->limit(10)->get();



        return view('welcome', [
            'categories' => $categories,
            'products' => $products,
            'sliders' => $sliders
        ]);
    }


    public function search(Request $request){

        if ($request->cat_id !== null){
            $products = Product::orderby('created_at', 'DESC')->where('cat_id', $request->cat_id)
                ->where('name', 'like', '%' . $request->name . '%')->paginate(9);
        } else{
            $products = Product::orderby('created_at', 'DESC')->where('name', 'like', '%' . $request->name . '%')->paginate(9);

        }



        $subcategories = Subcategory::orderby('created_at', 'ASC')->where('cat_id', $request->cat_id)->get();

        return view('searchProducts', [
            'products' => $products,
            'subcategories' => $subcategories,
        ]);

    }




    public function contact() {

        return view('contact', [
        ]);

    }

    public function productSubcategory($id, Request $request){

        // რექვესტის ვალიდაცია.

        $subcategory = Subcategory::find($id);

        if ($request->min_price ==! 0 || $request->max_price ==! 0) {
            $price = Product::orderby('created_at', 'DESC');

            if ($request->min_price ==! 0 && $request->max_price == 0){
                $price->where('price', '>=', $request->min_price);
            } else {
                $price->whereBetween('price', [$request->min_price, $request->max_price]);
            }
            $products = $price->paginate(9);

        } else {
            $products = Product::orderby('created_at', 'DESC')->paginate(9);
        }



        return view('productSubcategory', [
            'subcategory' => $subcategory,
            'products' => $products
        ]);
    }


    public function product($sub_id, $id){


        $subcategory = Subcategory::find($sub_id);
        $product = Product::find($id);



        return view('product', [
            'product' => $product,
            'subcategory' => $subcategory
        ]);
    }

}
