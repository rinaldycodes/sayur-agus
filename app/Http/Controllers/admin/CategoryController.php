<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact(
            'categories',
        ));
    }

    public function create(Request $request)
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
         // MESSAGE FOR FORM
         $msg = [
            'required' => 'Wajib di isi tidak boleh kosong',
            'unique' => 'Data yang dimasukan sudah ada',
        ];

        // VALIDATE FORM
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ], $msg);

        //STORE DATA TO DATABASE
        $category = new Category;
        $category->name = $request->name;
        // SLUG
        $slug = Str::of($request->name)->slug('-');
        $category->slug = $slug;
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Berhasil Menyimpan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $messages = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ], $messages);

        //store
        $category = category::where('slug', $slug)->firstOrFail();
        $category->name = $request->name;
        $slug = Str::of($request->name)->slug('-');
        $category->slug = $slug;
        $category->save();

        return redirect()->route('categories.index')->with('message', 'Berhasil Update Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Berhasil Menghapus Data');
    }
}
