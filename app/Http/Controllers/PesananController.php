<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\Produk;
use App\Checkout;
use Carbon\Carbon;
use Auth;
use DB;

class PesananController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$pesanan = Pesanan::join('produks', 'pesanans.id_barang', '=', 'produks.id')
        ->select('pesanans.*', 'produks.gambar')
        ->where('id_pemesan', Auth::user()->id)
        ->where('status', 'Belum Terbayar')
        ->get();           

        $jml = DB::table('pesanans')
        ->select(DB::raw('SUM(total_harga) as total'))
        ->where('status', 'Belum Terbayar')
        ->get();

        $status = Pesanan::join('produks', 'pesanans.id_barang', '=', 'produks.id')
        ->select('pesanans.*', 'produks.gambar')
        ->where('id_pemesan', Auth::user()->id)
        ->get();

        $dikirim = Checkout::join('pengirimans', 'checkouts.id', '=', 'pengirimans.id_checkout')
        ->select('pengirimans.*', 'checkouts.*')
        ->where('checkouts.id_pembeli', Auth::user()->id)
        ->get();

        $sampai = Checkout::join('pengirimans', 'checkouts.id', '=', 'pengirimans.id_checkout')
        ->where('checkouts.status', 'Sampai Tujuan')
        ->get();


        return view('pesanan', ['pesanan' => $pesanan, 'jml' => $jml, 'status' => $status, 'pengiriman' => $dikirim, 'sampai' => $sampai]);
    }


    public function updatePesananGet($id){
        $produk = Pesanan::where('id', $id)
        ->where('status', 'Belum Terbayar')
        ->get();

        return view('ubah-pesanan',['produk' => $produk]);
    }


    public function updatePesananPost(Request $request){
        $total = $request->harga_satuan * $request->jumlah_barang;
        Pesanan::where('id', $request->id_brg)
        ->where('status', 'Belum Terbayar')
        ->update([
            'warna' => $request->warna,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $total,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        Pesanan::where('id_pemesan', Auth::user()->id)
        ->where('status', 'Belum terbayar')
        ->update([
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/pesanan');
    }


    public function deletePesanan(Request $request){
        Pesanan::where('id', $request->id_barang)
        ->where('status', 'Belum Terbayar')
        ->delete();

        return back();
    }


    public function tambahPesanan(Request $request){
    	$total = $request->harga_satuan * $request->jumlah_barang;

    	Pesanan::create([
    		'id_pemesan' => Auth::user()->id,    		
    		'foto' => $request->gambar,
    		'id_barang' => $request->id_brg,
    		'nama_barang' => $request->nama_barang,
    		'warna' => $request->warna,
    		'penggunaan' => $request->penggunaan,
    		'harga_satuan' => $request->harga_satuan,
    		'jumlah_barang' => $request->jumlah_barang,
    		'total_harga' => $total,
    	]);

        Pesanan::where('id_pemesan', Auth::user()->id)
        ->where('status', 'Belum Terbayar')
        ->update([
            'status' => 'Belum Terbayar',
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('/pesanan');
    }

    public function pesan($id){
        $check = Produk::where('id', $id)->first();
        if ($check == null) {
            return view('kosong');
        } else {    
            $produk = Produk::where('id', $id)->get();
            return view('pesan',['produk' => $produk]);   
        }
    }

    public function konfirmasiPenerimaan(Request $request){

        $time = Checkout::select('updated_at')
        ->where('id', $request->id_diterima)
        ->pluck('updated_at');

        $test = Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
        ->join('pengirimans', 'checkouts.id', '=', 'pengirimans.id_checkout')
        ->where('pengirimans.id_checkout', $request->id_diterima)
        ->update([
            'checkouts.status' => 'Diterima',
            'pesanans.status' => 'Diterima',
            'pesanans.updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return back()
        ->with('info', 'Barang Telah Diterima Terimakasih Sudah Berbelanja.');
    }

}
