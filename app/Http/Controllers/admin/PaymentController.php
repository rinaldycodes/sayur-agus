<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::get();

        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payments.create');
    }

    public function store(Request $request)
    {
        // MESSAGE FOR FORM
        $msg = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        
        // VALIDATE FORM
        $validated = $request->validate([
            'payment' => 'required|unique:payments|max:20',
            'name' => 'required|max:50',
            'no_rek' => 'required|max:50',
        ], $msg);
        
        //STORE DATA TO DATABASE
        $data = $request->all;
        $data['payment'] = $request->payment;
        $data['name'] = $request->name;
        $data['no_rek'] = $request->no_rek;
        Payment::create($data);

        return redirect()->route('payments.index')->with('message', 'Berhasil Menyimpan Data dan silahkan upload gambar!');
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payments.edit', compact('payment'));
    }

  
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Wajib di isi',
            'unique' => 'Data yang dimasukan sudah ada',
        ];
        
        $validated = $request->validate([
            'payment' => 'required|max:50',
            'name' => 'required|max:50',
            'no_rek' => 'required|max:50',
        ], $messages);

        //store
        $payment = Payment::findOrFail($id);
        $payment->payment = $request->payment;
        $payment->name = $request->name;
        $payment->no_rek = $request->no_rek;
        $payment->save();

        return redirect()->route('payments.index')->with('message', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $product = Payment::findOrFail($id);
        $product->delete();

        return redirect()->route('payments.index')->with('message', 'Berhasil Menghapus Data');
    }
}
