<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class HomepageController extends Controller
{
    public function index(){
    	$baru = Produk::where('penggunaan', 'Baru')
    	->paginate(4);

    	$bekas = Produk::where('penggunaan', 'Bekas')
    	->paginate(4);

    	return view('welcome', ['baru' => $baru, 'bekas' => $bekas]);
    }
}
