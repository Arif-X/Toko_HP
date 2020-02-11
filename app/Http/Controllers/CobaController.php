<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Checkout;
use App\Produk;
use Carbon\Carbon;
use DB;
use Auth;

class CobaController extends Controller
{
    public function cobaquery(){    	

        DB::enableQueryLog();
        
        $processexist = Pengiriman::select('*')
            ->where('id', 23)
            ->first();
        dd($processexist);
        
        // dd(DB::getQueryLog());
    }
}
