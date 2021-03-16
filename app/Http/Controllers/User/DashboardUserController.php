<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardUserController extends Controller
{
    public function index() {
        return view('user.dashboard');
    }
}
