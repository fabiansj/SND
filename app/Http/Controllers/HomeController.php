<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ProductRepository;

class HomeController extends Controller
{
    public function index(){
        $productDesc    = ProductRepository::getLimit();
        $product        = ProductRepository::getAll();
        
        return view('index', compact(
            'product',
            'productDesc'
        ));
    }
}
