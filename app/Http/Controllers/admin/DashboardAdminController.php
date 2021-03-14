<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $userCount = User::where('role', 'USER')->count();

        $total = Transaction::sum('transaction_total');
        $countAll = Transaction::all()->count();
        $countSuccess = Transaction::where('transaction_status', 'success')->count();
        $countPending = Transaction::where('transaction_status', 'Pending')->count();
        $countPending = Transaction::where('transaction_status', 'Pending')->count();
        $monthNow = date('y-m');
        $totalMonthly = Transaction::where('created_at', $monthNow)
            ->orwhere('transaction_status', 'success')
            ->sum('transaction_total');

        
        return view('admin/dashboard-admin',  compact(
            'transactions', 'countAll', 'countSuccess',
            'countPending', 'total', 'monthNow' , 'totalMonthly',
            'userCount',
        ));
    }
}
