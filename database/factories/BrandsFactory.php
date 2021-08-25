<?php

namespace Database\Factories;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandsFactory extends Factory
{

    protected $model = Brands::class;


    public function definition()
    {
        return [
            'name' =>Str::random(5)
        ];
    }
}
