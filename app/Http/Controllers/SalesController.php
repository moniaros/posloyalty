<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalesController extends Controller {

    public function index() {
        return view('sales/index');
    }
    
    public function upload(Request $request) {
        
    }

}
