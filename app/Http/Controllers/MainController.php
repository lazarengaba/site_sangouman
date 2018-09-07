<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;

class MainController extends Controller
{
    function checkLogin(Request $request) {

        $user_data = array(
            'email'            =>      $request->get('email'),
            'password'         =>      $request->get('password')
        );

        if (Auth::attempt($user_data)) {
            return redirect('administration');
        } else {
            return back()->with('error', 'Adresse électronique ou mot de passe incorect (s)');
        }
        
    }

    function logOut() {
        Auth::logout();
        return redirect('connexion');
    }
}
