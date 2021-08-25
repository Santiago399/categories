<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{

    function __construct(){
        $this->middleware('auth');
    }

    function show()
    {
        $brandsList = Brands::all(); // Es lo mismo que decir Select * from brands
        return view('brands/List', ['list' =>$brandsList]);
    }

     function delete($id){
        //Product::destroy($id);
        $brands= Brands::findOrfail($id);
        $brands->delete();
        return redirect('/brands')->with('message', 'Fue borrada una marca');
    }

    function form($id = null){
        $brands = new Brands();
        if ($id != null) {
           $brands = Brands::findOrFail($id);
        }
        return view('brands/form',['brands' => $brands]);
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|max:50',

        ]);

        $brands = new Brands();
        $message = 'se ha creado una nueva marca';


        if (intval($request->id)>0) {

            $brands = Brands::findOrFail($request->id);
            $message = 'se ha editado una marca ';
        }

        $brands->name = $request->name;


        $brands->save();
        return redirect('/brands')->with('successMessage', $message);

    }
}
