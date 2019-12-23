<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.home');
    }

    /**
     * Show the application about.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('partials.about');
    }

    /**
     * Show the application contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('partials.contact');
    }

    /**
     * Show the application category.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        return view('partials.category');
    }

    /**
     * Show the application blog-post.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogPost()
    {
        return view('partials.blog-post');
    }
}
