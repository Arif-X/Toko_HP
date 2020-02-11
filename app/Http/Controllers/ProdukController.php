<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::paginate(8);
    	return view('produk', ['produk' => $produk]);
    }

    public function filterMerek($merek){
    	$filter = Produk::where('merek', $merek)
        ->paginate(8);
        return view('produk-filter', ['filter' => $filter]);
    }

    public function filterMerekLain(){        
        $filter = Produk::whereNotIn('merek', ['Samsung', 'Iphone', 'Sony', 'LG', 'Google', 'Asus', 'Nokia'])
        ->paginate(8);
        return view('produk-filter', ['filter' => $filter]);
    }

    public function filterKondisi($penggunaan){
    	$filter = Produk::where('penggunaan', $penggunaan)
        ->paginate(8);
        return view('produk-filter', ['filter' => $filter]);
    }

    public function filterNama(Request $request){
        $cari = $request->tipe;
        $filter = Produk::where('tipe','like',"%".$cari."%")
        ->paginate(8);
        return view('produk-filter', ['filter' => $filter]);
    }
}
