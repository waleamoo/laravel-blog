<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    // returns the index view 
    public function index(){
        return view('pages.index'); // index here represent "index.blade.php" in /view/pages
    }

    public function about(){
        return view('pages.about');
    }

    public function services(){
        return view('pages.services');
    }
}
