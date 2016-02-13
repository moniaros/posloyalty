<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Promo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;

class PromoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $user = Auth::user();

        $lastPromo = Promo::orderBy('id', 'desc')->first();

        return view('promo', [
            'currentUser' => $user,
            'promo'       => $lastPromo
        ]);
    }

    public function json() {
        return Promo::orderBy('id', 'desc')->first();
    }

    public function store(Request $request, FileHelper $fileHelper) {

        $file  = array('promo_image' => $request->file('promo_image'));
        $rules = array('promo_image' => 'required|mimes:jpeg,bmp,png|max:10000');

        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            echo json_encode($validator);
            // send back to the page with the input data and errors
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $user       = Auth::user();
            $promoImage = $request->file('promo_image');

            $promo = new Promo();

            $promo->image_file = $fileHelper->upload($promoImage);            
            $promo->save();

            Session::flash('success', 'Upload successful');
            return Redirect::back();
        }
    }

}
