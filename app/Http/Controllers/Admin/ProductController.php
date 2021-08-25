<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('cat_id', 'ASC')->get();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderby('created_at', 'DESC')->get();
        $subcategories = Subcategory::orderby('created_at', 'DESC')->get();

        return view('admin.product.create', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->product_img = $request->product_img;

        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->sale_id = $request->sale_id;

        if ($product->sale_id == 1 ){
            $product->sale_price = $request->sale_price;
        }


        $product->subcat_id = $request->subcat_id;
        $product->cat_id = $request->cat_id;

        $product->save();



        if ($request->hasFile('product_imgs')){

            $imgs = $request->file('product_imgs');

            foreach ($imgs as $img) {
                $product_image = new Product_images();
                $img_name = rand('100', '99999') . $img->getClientOriginalName();

                $patch = public_path('files/img/');
                $img->move($patch, $img_name);
                $product_image->name = $img_name;
                $product_image->product_id = $product->id;
                $product_image->save();
            }
        }

        return redirect()->back()->withSuccess('პროდუქტი წარმატებით დაემატა');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $product =  Product::find($id);
        $categories = Category::orderby('name', 'ASC')->get();
        $subcategories = Subcategory::orderby('name', 'ASC')->get();

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->product_img = $request->product_img;
        $product->product_desc = $request->product_desc;
        $product->price = $request->price;
        $product->sale_id = $request->sale_id;

        if ($product->sale_id == 1 ){
            $product->sale_price = $request->sale_price;
        }


        $product->subcat_id = $request->subcat_id;
        $product->cat_id = $request->cat_id;

        $product->save();

        return redirect()->back()->withSuccess('პროდუქტი წარმატებით განახლდა');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::find($id);
        $product->delete();

        $imgs = Product_images::all();

        foreach ($imgs as $img) {
                if ($img['product_id'] == $id) {
                    $img->delete();
                }
        }

        return redirect()->back()->withSuccess('პროდუქცია წარმატებით წაიშალა');
    }
}
