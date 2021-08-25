<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

})->middleware('auth');


Route::get('/nombre/{nombre?}', [PersonaController::class , 'mostrarNombre']
)->where('nombre', '[A-Za-z]+');

//[0-9]+
// crear ruta que reciba numeros y devolver el numero con un formato con un punto por separador
Route::get('/numero/{unnumero?}', function ($unnumero = null) {
    if (!$unnumero) {
        # cuano sea null ejecutar eso
        return "debe enviar un valor numerico";
    }


    return "Número : " . number_format($unnumero);
})->where('unnumero','[0-9]+');

//use Illuminate\Support\Facades\DB;

// Route::get('/products', function(){
//     $products = DB::table('products')->get();
//     return dd($products);
// });

use App\Http\Controllers\ProductController;
Route::get('/products', [ProductController::class , "show"] );

Route::get('/ptoduct/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('product/form/{id?}', [ProductController::class, 'form'])->name('product.form');

Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\BrandsController;
Route::get('/brands', [BrandsController::class , "show"] );

Route::get('/brands/delete/{id}', [BrandsController::class, 'delete'])->name('brands.delete');
Route::get('brands/form/{id?}', [BrandsController::class, 'form'])->name('brands.form');
Route::post('/brands/save', [BrandsController::class, 'save'])->name('brands.save');

use App\Http\Controllers\CategoryController;
Route::get('/categories', [CategoryController::class , "show"] );

Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('category/form/{id?}', [CategoryController::class, 'form'])->name('category.form');
Route::post('/category/save', [CategoryController::class, 'save'])->name('category.save');

