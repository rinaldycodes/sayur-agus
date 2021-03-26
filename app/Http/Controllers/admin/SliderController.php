<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $msg = [
            'required' => "Tidak boleh kosong"
        ];

        $request->validate([
            'name' => 'required',
            'img' => 'required|mimes:jpg,png,jpeg'
        ], $msg);

        $data = $request->all();
        $data['img'] = $request->file('img')->store('images', 'public');

        Slider::create($data);

        return redirect()->route('sliders.index')->with('message', 'Berhasil Menambahkan Data');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        Storage::disk('public')->delete($slider->img);

        $slider->delete();

        return back()->with('message', 'Berhasil Menghapus Data');
    }
}
