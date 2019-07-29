<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;
use App\User; // this is very important compared to illuminate

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        //$user = User::find($user_id);
        //
        $user = User::find($user_id);
        return view('home')->with('posts', $user->posts);
    }
}
