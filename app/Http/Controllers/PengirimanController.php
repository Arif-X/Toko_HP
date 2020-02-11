<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Checkout;
use App\Pengiriman;

class PengirimanController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function pengirimanIndex($id){

		$check = Checkout::where('id', $id)
		->where('id_pembeli', Auth::user()->id)
		->where('status', 'Dikirim')
		->get();

		if ($check == null) {
			return redirect('/pesanan')
			->with('info', 'Anda Tidak Bisa Melihat Status Pengiriman Ini');
		} else {
			$time = Checkout::select('updated_at')
			->where('id', $id)
			->pluck('updated_at');

			$checkout = Checkout::get();

			$pesanan = Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
			->where('checkouts.id', $id)
			->where('pesanans.updated_at', $time)
			->get();

			$pengiriman = Pengiriman::where('id_checkout', $id)
			->get();

			$jumlah = Checkout::where('id', $id)
			->get();

			return view('lihat-pengiriman', ['pesanan' => $pesanan, 'jumlah' => $jumlah, 'pengiriman' => $pengiriman, 'checkout' => $checkout]);
		}
	}   
}
