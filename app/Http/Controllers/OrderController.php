<?php

namespace App\Http\Controllers;

use App\Imports\AmazonsImport;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{

    public function index(){
        return view('index', [
            'orders' => Order::get()
        ]);
    }

    public function uploadAmazons(Request $request) {

        Excel::import(new AmazonsImport, $request->file('file'));

        return redirect('/')->with('success', 'Date degli ordini aggiornate!');

    }
    
}
