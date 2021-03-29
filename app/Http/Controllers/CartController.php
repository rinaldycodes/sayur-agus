<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Trasaction;
use App\Models\TrasactionDetail;
use Cart;

class CartController extends Controller
{
    public function index() {
        return view('cart');
    }
   
    public function add_item(Request $request, $slug) {
        $product = Product::where('slug', $slug)->firstOrFail();

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->price,
            "options" => [
                'img' => $img = $product->galleries->first() ? $product->galleries->first()->img : '',
                'stock' => $product->stock,
            ],
        ]);

        // UPDATE STOCK
        $product->stock -= $request->qty;
        $product->save();

        return back()->with('message', 'Berhasil Menambah Cart');
    }

    public function update(Request $request, $rowId) {
        Cart::update($rowId, $request->$rowId);
        return redirect('/cart');
    }

    public function remove(Request $request, $rowId) {
        $item = Cart::content()[$rowId];
        $product = Product::findOrFail($item->id);
        $product->stock += $item->qty;
        $product->save();
        
        Cart::remove($rowId);

        return redirect('/cart')->with('message', 'Berhasil Menghapus Cart');
    }

    public function destroy(Request $request) {
        Cart::destroy();
        return redirect('/');
    }

}
