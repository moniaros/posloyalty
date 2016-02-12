<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller {

    public function products() {

        $lastUpdate = Input::get('lastUpdate');

        if ($lastUpdate) {
            $products = Product::newData($lastUpdate)->get();
        } else {
            $products = Product::all();
        }

        return $products;
    }

}
