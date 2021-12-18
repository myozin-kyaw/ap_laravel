<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        // $data = ['Home_key'=>'Home_value'];
        $data = Post::all(); // call data
       # dd($data); // dump and die
        return view('home', compact('data'));
    }

    // public function about() 
    // {
    //     $data = ['About_key'=>'About_value'];
    //     return view('about', compact('data'));
    // }

    // public function contact() 
    // {
    //     $data = ['Contact_key'=>'Contact_value'];
    //     return view('contact', compact('data'));
    // }

}
