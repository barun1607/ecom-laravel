<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\AlreadyExists;

class UserController extends Controller
{
    function login(Request $req)
    {
        // $req->validate(
        //     [
        //         'email' => 'required|email:rfc',
        //         'password' => 'required'
        //     ],
        //     [
        //         'email.email' => 'Please enter a valid E-mail ID',
        //         'email.required' => 'Please fill out this field',
        //         'password.required' => 'Please enter a password'
        //     ]
        // );

        $user = User::where(['email' => $req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            $fail = true;
            return view('login', ['fail' => $fail]);
        } else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    // function register(Request $req)
    // {
    //     // $validatedData = Validator::make(
    //     //     $req->all(),
    //     //     [
    //     //         'name' => 'required',
    //     //         'email' => [
    //     //             'required',
    //     //             'email:rfc',
    //     //             new AlreadyExists
    //     //         ],
    //     //         'password' => 'required|min:8',
    //     //         'reconfirm' => 'required|same:password'
    //     //     ],
    //     //     [
    //     //         'name.required' => 'Please enter a username',
    //     //         'email.required' => 'Please enter an E-mail ID',
    //     //         'password.required' => 'Please enter a password',
    //     //         'reconfirm.required' => 'Please re-enter enter the password',
    //     //         'password.min' => 'Password must be at least 8 characters long',
    //     //         'reconfirm.same' => "Passwords don't match"
    //     //     ]
    //     // )->validate();

    //     $user = new User;
    //     $user->name = $req->name;
    //     $user->email = $req->email;
    //     $user->password = Hash::make($req->password);
    //     $user->save();

    //     return redirect('');
    // }
}
