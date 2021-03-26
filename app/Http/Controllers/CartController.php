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
        // Add some items in your Controller.
        // Cart::add('192ao12', 'Product 1', 1, 9.99);
        // Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->price,
            "options" => [
                'img' => $img = $product->galleries->first() ? $product->galleries->first()->img : ''
                ],
        ]);

        return back()->with('message', 'Berhasil Menambah Cart');
    }

    public function update(Request $request, $rowId) {
        Cart::update($rowId, $request->$rowId);
        return redirect('/cart');
    }

    public function remove(Request $request, $rowId) {
        Cart::remove($rowId);

        return redirect('/cart')->with('message', 'Berhasil Menghapus Cart');
    }

    public function destroy(Request $request) {
        Cart::destroy();
        return redirect('/');
    }

}
