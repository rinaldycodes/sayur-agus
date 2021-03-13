<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TransactionController extends Controller
{
    
    public function index()
    {
        $transactions = Transaction::all();
        $transaction = Transaction::latest()->paginate(5);

        return view('admin.transactions.index', compact('transactions'));
    }

    
    public function create()
    {

        return view('admin.transactions.create');
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
        //
    }

 
    public function edit($slug)
    {
        $transaction = Transaction::where('slug', $slug)->firstOrFail();

        return view('admin.transactions.edit', compact('transaction'));
    }

  
    public function update(Request $request, $slug)
    {
        $messages = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        
        $validated = $request->validate([
            'name' => 'required|unique:transactions|max:255',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ], $messages);

        //store
        $transaction = Transaction::where('slug', $slug)->firstOrFail();
        $transaction->name = $request->name;

        $slug = Str::of($request->name)->slug('-');
        $transaction->slug = $slug;

        $price = str_replace('.','', $request->price);
        $transaction->price = $price;

        $transaction->stock = $request->stock;
        $transaction->category_id = $request->category_id;
        $transaction->description = $request->description;
        $transaction->save();

        return redirect()->route('transactions.index')->with('message', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('message', 'Berhasil Menghapus Data');
    }
}
