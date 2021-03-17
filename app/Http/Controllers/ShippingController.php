<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Payment;
use Cart;
use Illuminate\Support\Facades\Auth;


class ShippingController extends Controller
{
    public function index(){
        $payments = Payment::get();
        if (Cart::count() >= 1) {
            return view('shipping', compact('payments'));
        } else {
            $msg = "Kamu belum menambahkan apapun ke keranjang!";
            return view('errors.404', compact('msg'));
        }
    }

    public function store(Request $request) {
        // CHECK USER LOGGED IN / OR NOT
        if(Auth::user()) {
            $msg = [
                'name.required' => "Email tidak boleh kosong",
                'no_telp.required' => "No Telp / WA tidak boleh kosong",
                'numeric' => "Harus berkarakter angka",
                'address.required' => "Alamat tidak boleh kosong",
                'payment.required' => "Pilih Payment",
            ];
    
            $validated = $request->validate([
                'name' => 'required|max:255',
                'no_telp' => 'required|numeric',
                'address' => 'required',
                'payment_id' => 'required',
            ], $msg);

            $id = Auth::user()->id;
            $transaction_id = now()->timestamp;

            $transaction = new Transaction;
            $transaction->id = $transaction_id;
            $transaction->user_id = $id;
            $transaction->receiver_name = $request->name;
            $transaction->no_telp = $request->no_telp;
            $transaction->address = $request->address;
            $transaction->message = $request->message;
            $transaction->payment_id = $request->payment_id;
            $transaction->message = $request->message ? $request->message : '' ;
            $transaction->transaction_total = str_replace('.', '', Cart::total());
            $transaction->transaction_status = "PENDING";
            $transaction->save();
    
            foreach (Cart::content() as $item) {
                $transactionDetail = new TransactionDetail;
                $transactionDetail->transaction_id = $transaction_id;
                $transactionDetail->product_id = $item->id;
                $transactionDetail->qty = $item->qty;
                $transactionDetail->sub_total = $item->subtotal;
                $transactionDetail->save();
            }
            
            // MENGHAPUS CART
            Cart::destroy();

            // membuat session transaction id 
            session(['transaction_id' => $transaction_id]);

            return redirect()->route('checkout');
        } else {
            return redirect('login')->with('message', 'Login untuk melanjutkan shipping');
        }
    }

    public function checkout() {

        // MENGAMBIL SESSION DATA TRANSACTION ID
        // UNTUK MENDAPATKAN DATA TRANSAKSI DAN DETAIL
        $id = session('transaction_id');
        $transaction = Transaction::findOrFail($id);
        $transactionDetails = TransactionDetail::where('transaction_id', $id)
        ->with('product')
        ->get();
        $payments = Payment::get();

        return view('checkout', compact(
            'transaction',
            'transactionDetails', 'payments'
        ));
    }

    public function cetak($id) {
        $transaction = Transaction::findOrFail($id);
        $transactionDetails = TransactionDetail::where('transaction_id', $id)
            ->with('product')
            ->get();
        ;
        
        return view('cetak', compact(
            'transaction',
            'transactionDetails',
        ));
    }


}
