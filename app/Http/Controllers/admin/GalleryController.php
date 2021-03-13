<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.galleries.create');
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
            'name' => 'required|unique:galleries|max:255',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ], $messages);

        //STORE DATA TO DATABASE
        $gallery = new gallery;
        $gallery->name = $request->name;

        // SLUG
        $slug = Str::of($request->name)->slug('-');
        $gallery->slug = $slug;

        // REPLACE . INTO NONECHARACTER
        $price = str_replace('.','', $request->price);
        $gallery->price = $price;

        $gallery->stock = $request->stock;
        $gallery->category_id = $request->category_id;
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('galleries.index')->with('message', 'Berhasil Menyimpan Data!');
    }

    public function show($id)
    {
        //
    }

 
    public function edit($slug)
    {
        $gallery = Gallery::where('slug', $slug)->firstOrFail();

        return view('admin.galleries.edit', compact('gallery'));
    }

  
    public function update(Request $request, $slug)
    {
        $messages = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        
        $validated = $request->validate([
            'name' => 'required|unique:galleries|max:255',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ], $messages);

        //store
        $gallery = Gallery::where('slug', $slug)->firstOrFail();
        $gallery->name = $request->name;

        $slug = Str::of($request->name)->slug('-');
        $gallery->slug = $slug;

        $price = str_replace('.','', $request->price);
        $gallery->price = $price;

        $gallery->stock = $request->stock;
        $gallery->category_id = $request->category_id;
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('galleries.index')->with('message', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return redirect()->route('galleries.index')->with('message', 'Berhasil Menghapus Data');
    }
}
