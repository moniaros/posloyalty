<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoresController extends Controller {

    public function index() {
        return view('stores/index');
    }
    
    public function store(Request $request) {
        
    }

}
