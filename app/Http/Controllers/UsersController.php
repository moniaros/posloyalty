<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller {

    public function login(Request $request) {

        $email    = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return [
                'status'  => "SUCCESS",
                'message' => "Success!",
                'user'    => Auth::user()
            ];
        } else {
            return [
                'status'  => "ERROR",
                'message' => "Invalid user credentials",
                'user'    => null
            ];
        }
    }    
    
}
