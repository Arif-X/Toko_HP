<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Checkout;
use App\Pengiriman;
use Auth;
use DB;
use Carbon\Carbon;

class CheckoutController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$check = Pesanan::where('id_pemesan', Auth::user()->id)
		->where('status', 'Belum Terbayar')
		->first();

		if($check == null){
			return redirect('/pesanan')
			->with('info', 'Anda Tidak Mempunyai Pesanan Yang Belum Terbayar');
		} else {
			$jml = DB::table('pesanans')
			->select(DB::raw('SUM(total_harga) as total'))
			->where('status', 'Belum Terbayar')
			->get();

			return view('checkout', ['jml' => $jml]);
		}		
	}

	public function checkoutPost(Request $request){
		$request->validate([
			'metode' => 'required',
			'nama' => 'required',
			'alamat' => 'required',
			'bayaran' => 'required',
			'bukti' => 'required|mimes:png,jpeg,jpg|max:2048',
			'kode_pos' => 'required',
			'no_hp' => 'required',
			'jumlah' => 'required',
		]);

		$fileName = $request->file('bukti')->getClientOriginalName();

		$request->bukti->move(storage_path('app/public/bukti'), $fileName);

		$check = Checkout::create([
			'id_pembeli' => Auth::user()->id,
			'jenis_pembayaran' => $request->metode,
			'nama' => $request->nama,
			'alamat' => $request->alamat, 
			'email_or_rek' => $request->bayaran,
			'bukti' => $fileName,
			'kode_pos' => $request->kode_pos,
			'no_hp' => $request->no_hp,
			'jumlah_dibayar' => $request->jumlah,
		]);		

		$deta = DB::table('pesanans')->where('id_pemesan', Auth::user()->id)
		->where('status', 'Belum Terbayar')
		->pluck('id');

		Pesanan::where('status', 'Belum Terbayar')
		->whereIn('id', $deta)
		->update([
			'status' => 'Pending',
			'updated_at' => Carbon::now()->toDateTimeString(),
		]);

		// dd($check);
		return redirect('/pesanan')
		->with('info', 'Checkout Diinput & Akan Diperiksa');
	}
}
