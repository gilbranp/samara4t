<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(){
        $donates = Donate::orderBy('created_at', 'desc')->take(5)->get();
        // Hitung total donasi uang
        $totalCashDonate = Donate::whereNotNull('amount')->sum('amount');
        // Hitung total donasi barang
        $totalItemDonate = Donate::whereNotNull('item_qty')->sum('item_qty');

        $totalActiveUsers = User::where('is_active', 1)->count(); // Menghitung pengguna aktif


        return view('backend.index', compact('donates','totalCashDonate','totalItemDonate','totalActiveUsers'));
    }
}
