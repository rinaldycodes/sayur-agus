<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Auth;

class PesananKamuController extends Controller
{
    public function index() {
        // USER ID SEDANG LOGIN
        $userID = Auth::user()->id;
        $transactions = Transaction::where('user_id', $userID)->get();
        $total = Transaction::where('user_id', $userID)->sum('transaction_total');
        return view('user.pesanan-kamu.index', compact('transactions', 'total'));
    }


    public function show($transaction_id) {
        // USER ID SEDANG LOGIN
        $userID = Auth::user()->id;
        $transaction = Transaction::findOrFail($transaction_id);

        // CEK USER ID SEDANG LOGIN DAN USER ID DI TRANSAKSI
        // JIKA SAMA MAKA TAMPILKAN
        $transactionDetails = TransactionDetail::where('transaction_id', $transaction_id)
            ->with('product')
            ->get();

        if($userID == $transaction->user_id) {
            return view('user.pesanan-kamu.show', compact('transaction', 'transactionDetails'));
        }
        $transactions = Transaction::get();
    }
}
