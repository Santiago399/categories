<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brands;
use App\Models\Category;

class ProductController extends Controller
{

 function __construct(){
     $this->middleware('auth');
 }

    //
    function show(){
        $productList = Product::has('brand')->get(); // Es lo mismo que decir Select * from products
        return view('product/List', ['list' =>$productList]);
    }

    function delete($id){
        //Product::destroy($id);
        $product = Product::findOrfail($id);
        $product->delete();
        return redirect('/products')->with('message', 'El producto fue borrado');
    }

    function form($id = null){
        $product = new Product();
        $brands = Brands::orderBy('name')->get();
        $category = Category::orderBy('name')->get();
        $category = Category::orderBy('description')->get();
        if ($id != null) {
           $product = Product::findOrFail($id);
        }
        return view('product/form',['product' => $product, 'brands' => $brands, 'category' => $category]);
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'brand' => 'required|max:50',
            'category'=> 'required|max:50',
        ]);

        $product = new Product();
        $message = 'se ha creado un producto nuevo';


        if (intval($request->id)>0) {

            $product = Product::findOrFail($request->id);
            $message = 'se ha editado un producto';
        }

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;

        $product->save();
        return redirect('/products')->with('successMessage', $message);

    }

}
