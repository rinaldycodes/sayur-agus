<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Auth;

class DashboardUserController extends Controller
{
    public function index() {
        $userID = Auth::user()->id;
        $transactions = Transaction::where('user_id', $userID)
            ->where('transaction_status', 'PENDING')
            ->latest()->get();
        return view('user.dashboard', compact('transactions'));
    }
}
