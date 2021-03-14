<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home() {
        $products = Product::all();

        return view('home', compact('products'));
    }

    public function product() {
        $products = Product::latest()->get();
        return view('product', compact(
            'products',
        ));
    }

    public function detail_product($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        
        return view('detail-product', compact('product'));
    }


}
