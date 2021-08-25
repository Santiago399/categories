<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //protected $table = "productos";

    function brand(){
        return $this->belongsTo(Brands::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
}
