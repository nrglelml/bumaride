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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function helpcenter(){
        return view ('helpcenter');
    }
    public function contactus(){
        return view('contactus');
    }
    public function aboutus(){
        return view('aboutus');
    }
    public function howitworks(){
        return view('howitworks');
    }

}
