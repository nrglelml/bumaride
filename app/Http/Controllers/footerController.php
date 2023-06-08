<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class footerController extends Controller
{
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
