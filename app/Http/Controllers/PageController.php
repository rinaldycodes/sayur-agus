<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home() {
        $products = Product::with('galleries')->limit(4)->get();

        return view('home', compact('products'));
    }

    public function product() {
        $products = Product::with('galleries')->latest()->get();
        return view('product', compact(
            'products',
        ));
    }

    public function detail_product($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        $related = Product::where('category', $product->category)
            ->with('galleries')
            ->limit(4)
            ->inRandomOrder()
            ->get();
        
        return view('detail-product', compact('product','related'));
    }


}
