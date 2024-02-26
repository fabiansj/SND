<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function aboutshow()
    {
        return view('about');
    }

    public function contactshow()
    {
        return view('contact');
    }

    public function productshow()
    {
        return view('product');
    }

    public function photoshow()
    {
        return view('photo');
    }

    public function videoshow()
    {
        return view('video');
    }
}
