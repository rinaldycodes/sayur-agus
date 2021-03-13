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
   
    public function kode($format){
        return strtoupper(substr($format, 0, 4)).'-'.substr(rand(), 0, 5);
        $product = Product::where('slug', $slug)->firstOrFail();
            // Membuat SESSION BARU
            // MAKE INVOICE NUMBER WITH DATE 
            // AND RANDOM NUMBER
            $time = now()->timestamp;
            $format = date("dmy", $time);
            $no_invoice = $format.substr(rand(), 0, 4);
            
            $cart = $request->session()->put('cart', $no_invoice);
            
            $cart[$product->id] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_qty' => $request->qty,
                'product_price' => $request->price
            ];



        $transactionDetail = new TransactionDetail;
        $trasactionDetail->transaction_id = $no_invoice;
        $trasactionDetail->product_id = $product->id;
        $trasactionDetail->qty = $request->qty;
        $trasactionDetail->sub_total = $subtotal;
        $transactionDetail->save();
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
        ]);

        return redirect('/cart');
    }

    public function update(Request $request, $rowId) {
        Cart::update($rowId, $request->$rowId);
        return redirect('/cart');
    }

    public function remove(Request $request, $rowId) {
        Cart::remove($rowId);

        return redirect('/cart');
    }

    public function destroy(Request $request, $rowId) {

        Cart::remove($rowId);

        return redirect('/cart');
    }

    public function shipping(){
        return view('shipping');
    }
}
