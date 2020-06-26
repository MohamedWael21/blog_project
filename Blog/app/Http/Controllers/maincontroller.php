<?php

namespace App\Http\Controllers;

use App\Rules\confirm;
use Illuminate\Http\Request;
use App\models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\models\post;

class maincontroller extends Controller
{
    // show homepage
    public function showHome()
    {
        // return last 10 posts
        $posts = post::where("id",">", 1)->orderBy("id","desc")->take(10)->get();

        // return home page and pass the posts
        return view("Home")->with("posts",$posts);
    }

    // show login and sigin page
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route("home");
        }
        return view("Gate");
    }

    // create user in database 
    public function signIn(Request $request)
    {
        // validate the request 
        $request->validate([

            "userName" => "required",
            "email"    => "required|email",
            "password" => "required|min:8",
            "confirm"  =>  ["required", new confirm($request->password)]
        ]);
        // hash the password
        $hashed = Hash::make($request->password);

        // create user in data base
        $user = new user();
        $user->username = $request->userName;
        $user->email = $request->email;
        $user->password = $hashed;
        if ($user->save()) {
            // redirect on success if the user added
            return redirect()->back()->with("success", "The data have been submited");
        }
    }

    // auth the user
    public function logIn(Request $request)
    {
        if ($request->remember) {

            $result = Auth::attempt($request->only("username", "password"), true);
        } else {

            $result = Auth::attempt($request->only("username", "password"));
        }
        if ($result) {
            return redirect()->route("home");
        }

        return redirect()->back()->with("wrong", "wrong username or password");
    }

    // logout user
    public  function logOut()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    // show add page
    public function showAdd()
    {
        return view("add");
    }

    // show profile of user
    public function  showProfile()
    {
        // get user id
       $id = Auth::user()->id;
       //get user posts by its id
       $posts = user::find($id)->posts;
    
        // return profile page and pass posts of the user
       return view("profile")->with("posts",$posts);
    }
}
