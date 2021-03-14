<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('galleries')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact(
            'categories',
        ));
    }

    public function store(Request $request)
    {
        // MESSAGE FOR FORM
        $msg = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        
        
        // VALIDATE FORM
        $validated = $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'description' => 'required',
        ], $msg);
        
        //STORE DATA TO DATABASE
        $product = new Product;
        $product->name = $request->name;

        // SLUG
        $slug = Str::of($request->name)->slug('-');
        $product->slug = $slug;

        // REPLACE . INTO NONECHARACTER
        $price = str_replace('.','', $request->price);
        $product->price = $price;

        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('galleries.show', $product->slug)->with('message', 'Berhasil Menyimpan Data dan silahkan upload gambar!');
    }

    public function show($id)
    {
        //
    }

 
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('admin.products.edit', compact('product'));
    }

  
    public function update(Request $request, $slug)
    {
        $messages = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        
        $validated = $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ], $messages);

        //store
        $product = Product::where('slug', $slug)->firstOrFail();
        $product->name = $request->name;

        $slug = Str::of($request->name)->slug('-');
        $product->slug = $slug;

        $price = str_replace('.','', $request->price);
        $product->price = $price;

        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.index')->with('message', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('message', 'Berhasil Menghapus Data');
    }
}
