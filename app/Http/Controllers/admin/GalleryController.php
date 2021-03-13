<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Storage;



class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        $gallery = Gallery::latest()->paginate(5);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create($slug)
    {
        //
    }

    public function store(Request $request)
    {
        // MESSAGE FOR FORM
        $messages = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        

        // VALIDATE FORM
        $validated = $request->validate([
            'img' => 'required',

        ], $messages);

        //STORE DATA TO DATABASE
        $gallery = new gallery;
        $gallery->img = $request->file('img')->store('images', 'public'
            
        );
        $gallery->product_id = $request->product_id;

        $gallery->save();

        return back()->with('message', 'Berhasil Menyimpan Data!');
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $galleries = Gallery::where('product_id', $product->id)->get();
        return view('admin.galleries.show', compact(
            'product', 'galleries',
        ));
    }

 
    public function edit($slug)
    {
        //
    }

  
    public function update(Request $request, $slug)
    {
        //
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('galleries.index')->with('message', 'Berhasil Menghapus Data');
    }

    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);
        $value = str_replace('images/', '', $gallery->img);

        Storage::disk('public')->delete($gallery->img);
        
        $gallery->delete();

        return back()->with('message', 'Berhasil Menghapus Foto');
    }
}
