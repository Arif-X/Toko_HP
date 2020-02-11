<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $baru = Produk::where('penggunaan', 'Baru')
        ->paginate(4);

        $bekas = Produk::where('penggunaan', 'Bekas')
        ->paginate(4);

        return view('welcome', ['baru' => $baru, 'bekas' => $bekas]);
    }
}
