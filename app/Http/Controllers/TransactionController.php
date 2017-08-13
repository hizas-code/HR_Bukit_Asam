<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    function viewTransaction(){
        $transactions = DB::table('transaksi')->get();
        return view('data', ['transactions' => $transactions]);
    }
}
