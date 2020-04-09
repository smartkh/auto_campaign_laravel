<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.partials.home');
    }

    /**
     * Show the application about.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontend.partials.about');
    }

    /**
     * Show the application contact.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontend.partials.contact');
    }

    /**
     * Show the application category.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        return view('frontend.partials.category');
    }

    /**
     * Show the application blog-post.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogPost()
    {
        return view('frontend.partials.blog-post');
    }
}
