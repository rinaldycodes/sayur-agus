<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;

class PageController extends Controller
{
    public function home() {
        $products = Product::with('galleries')->inRandomOrder()->limit(9)->latest()->get();
        $sliders = Slider::latest()->get();

        return view('home', compact('products', 'sliders'));
    }

    public function product() {
        $products = Product::with('galleries')->latest()->paginate(18);
        return view('product', compact(
            'products',
        ));
    }

    public function category_page($slug_category) {
        $category = Category::where('slug', $slug_category)->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->with('galleries')
            ->paginate(18);
        return view('product_category', compact(
            'products', 'category',
        ));
    }

    public function detail_product($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();
        $related = Product::where('category_id', $product->category_id)
            ->with('galleries')
            ->limit(4)
            ->inRandomOrder()
            ->get();
        
        return view('detail-product', compact('product','related'));
    }


}
