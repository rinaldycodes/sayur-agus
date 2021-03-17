<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    
    public function index()
    {
        $transactions = Transaction::with('payment')->get();
        $total = Transaction::sum('transaction_total');
        $totalSuccess = Transaction::where('transaction_status', 'success')->sum('transaction_total');
        $countAll = Transaction::all()->count();
        $countSuccess = Transaction::where('transaction_status', 'success')->count();
        $countPending = Transaction::where('transaction_status', 'Pending')->count();

        return view('admin.transactions.index', compact(
            'transactions', 'countAll', 'countSuccess',
            'countPending', 'total', 'totalSuccess' 
        ));
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
            'name' => 'required|unique:transactions|max:255',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ], $messages);

        //STORE DATA TO DATABASE
        $transaction = new transaction;
        $transaction->name = $request->name;

        // SLUG
        $slug = Str::of($request->name)->slug('-');
        $transaction->slug = $slug;

        // REPLACE . INTO NONECHARACTER
        $price = str_replace('.','', $request->price);
        $transaction->price = $price;

        $transaction->stock = $request->stock;
        $transaction->category_id = $request->category_id;
        $transaction->description = $request->description;
        $transaction->save();

        return redirect()->route('transactions.index')->with('message', 'Berhasil Menyimpan Data!');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transactionDetails = TransactionDetail::where('transaction_id', $id)
            ->get();
        ;

        return view('admin.transactions.show', compact(
            'transaction',
            'transactionDetails',
        ));
    }

 
    public function edit($id)
    {
        $transaction = Transaction::where('id', $id)->firstOrFail();

        return view('admin.transactions.edit', compact('transaction'));
    }

  
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Wajib di isi',
        ];
        
        $validated = $request->validate([
            'receiver_name' => 'required',
            'transaction_status' => 'required',
        ], $messages);

        //store
        $transaction = Transaction::where('id', $id)->firstOrFail();
        $transaction->transaction_status = $request->transaction_status;
        $transaction->save();

        return redirect()->route('transactions.index')->with('message', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transactionDetail = TransactionDetail::where('transaction_id', $transaction->id)
            ->firstOrFail();
        
        $transactionDetail->delete();
        $transaction->delete();

        return redirect()->route('transactions.index')->with('message', 'Berhasil Menghapus Data');
    }
}
