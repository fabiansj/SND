<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\GLTransStockRepository;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $product    = ProductRepository::index();
        
        return view('product.index', compact(
            'product',));
    }

    public function getDetail($id)
    {        
        $product        = ProductRepository::getDetail($id);
        $badge          = $product->subGroup;
        $badge2         = $product->type;
        $badge3         = $product->nama;
        $cekStock       = GLTransStockRepository::getStockSell($product->prid);
        $currentStock   = $product->stok + intval($cekStock->stock_sold);
        // dd($product->stok,intval($cekStock->stock_sold),$currentStock);
        return view('product.detail', compact(
            'product',
            'badge',
            'badge2',
            'badge3',
            'currentStock'
        ));
    }

    public function find(Request $request)
    {        
        $name      = $request->query('name');
        $product   = ProductRepository::getName($name);
        $badge     = '';
        $badge2    = 'Search';
        $badge3    = $name;
        $method    = 'Search';

        return view('product.group_type_find', compact(
            'product',
            'badge',
            'badge2',
            'badge3',
            'method',
        ));
    }

    public function findGroup($groupName)
    {        
        $product   = ProductRepository::getGroup($groupName);        
        $badge     = '';
        $badge2    = $product[0]->subGroup ?? '';
        $badge3    = $product[0]->type ?? '';
        $method    = 'Group';

        return view('product.group_type_find', compact(
            'product',
            'badge',
            'badge2',
            'badge3',
            'method',
        ));
    }

    public function findType($a,$b){
        $product   = ProductRepository::getType($a,$b);
        $badge     = '';
        $badge2    = $product[0]->subGroup ?? '';
        $badge3    = $product[0]->type ?? '';
        $method    = 'Type';
        
        return view('product.group_type_find', compact(
            'product',
            'badge',
            'badge2',
            'badge3',
            'method',
        ));
    }
}
