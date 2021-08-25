<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }

    function show()
    {
        $categoryList = Category::all(); // Es lo mismo que decir Select * from brands
        return view('category/List', ['list' =>$categoryList]);
    }

     function delete($id){
        //Product::destroy($id);
        $category= Category::findOrfail($id);
        $category->delete();
        return redirect('/categories')->with('message', 'Fue borrada ');
    }

    function form($id = null){
        $brands = new Category();
        if ($id != null) {
           $brands = Category::findOrFail($id);
        }
        return view('category/form',['category' => $brands]);
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'description' =>'required|max:50'

        ]);

        $category = new Category();
        $message = 'se ha creado una nueva ';


        if (intval($request->id)>0) {

            $category = Category::findOrFail($request->id);
            $message = 'se ha editado una  ';
        }

        $category->name = $request->name;
        $category->description = $request->description;



        $category->save();
        return redirect('/categories')->with('successMessage', $message);

    }

}
