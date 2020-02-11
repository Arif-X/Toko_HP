<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Produk;
use App\Checkout;
use App\Pesanan;
use App\User;
use App\Pengiriman;
use DB;
use File;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $guard = 'admin';

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }

    public function guard()
    {
        return auth()->guard('admin');
    }

    public function showRegisterPage()
    {
        return view('auth.adminRegister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:199',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed'
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin-login')->with('success','Registration Success');
    }

    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect('/admin/home');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    public function dashboard() {
        $user = auth()->guard('admin')->user();
        if ($user) {
            return view('admin');
        } else {
            dd($user);
        }        
    }

    public function produk() {
        $user = auth()->guard('admin')->user();
        if ($user) {
            $file = Produk::get();
            $files = $file->sortBy('id')->take(4);           
            return view('admin.produk',['produk' => $file]);
        } else {
            dd($user);
        }        
    }

    public function merek($merek) {
        $user = auth()->guard('admin')->user();
        if ($user) {
            $file = Produk::where('merek', $merek)->get();
            $files = $file->sortBy('id')->take(4);           
            return view('admin.produk',['produk' => $file]);
        } else {
            dd($user);
        }        
    }

    public function addProductGet(){
        $user = auth()->guard('admin')->user();
        if ($user) {     
            return view('admin.tambah-produk');
        } else {
            dd($user);
        }   
    }

    public function addProductPost(Request $request){
        $user = auth()->guard('admin')->user();
        if ($user) {
            $validator = Validator::make(request()->all(),[
                'merek' => 'required',
                'tipe' => 'required',
                'gambar' => 'required|mimes:png,jpeg,jpg|max:2048',
                'harga' => 'required',
                'warna1' => 'required',
                'warna2' => 'nullable',
                'warna3' => 'nullable',
                'penggunaan' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                return back()
                ->with('info', 'Data Tidak Valid/Masih Ada Yang Kosong');
            } else {
                $fileName = $request->file('gambar')->getClientOriginalName();
                $request->gambar->move(storage_path('app/public/gambar'), $fileName);

                Produk::create([
                    'merek' => $request->merek,
                    'tipe' => $request->tipe,
                    'gambar' => $fileName,
                    'harga' => $request->harga,
                    'warna1' => $request->warna1,
                    'warna2' => $request->warna2,
                    'warna3' => $request->warna3,
                    'penggunaan' => $request->penggunaan,
                    'keterangan' => $request->keterangan,
                ]);

                return redirect('/admin/produk')
                ->with('info', 'Produk Telah Ditambahkan');            
            }            
        } else {
            dd($user);
        } 
    }

    public function updateProductGet($id){
        $user = auth()->guard('admin')->user();
        if ($user) {     
            $data = Produk::where('id', $id)->get();
            return view('admin.edit-produk',['data' => $data]);
        } else {
            dd($user);
        }   
    }

    public function updateProductImagePost(Request $request){
        $user = auth()->guard('admin')->user();
        if ($user) {
            $validator = Validator::make(request()->all(),[
                'gambar' => 'required|mimes:png,jpeg,jpg|max:2048',
            ]);

            if ($validator->fails()){
                return back()
                ->with('info', 'Data Tidak Valid/Masih Ada Yang Kosong');
            } else {
                $fileName = $request->file('gambar')->getClientOriginalName();

                $request->gambar->move(storage_path('app/public/gambar'), $fileName);

                Produk::where('id', $request->id)->update([
                    'gambar' => $fileName,
                ]);

                return redirect('/admin/produk')
                ->with('info', 'Produk Telah Berhasil Diedit');         
            }   
        } else {
            dd($user);
        } 
    }

    public function updateProductPost(Request $request){
        $user = auth()->guard('admin')->user();
        if ($user) {
            $validator = Validator::make(request()->all(),[
                'merek' => 'required',
                'tipe' => 'required',
                'harga' => 'required',
                'warna1' => 'required',
                'warna2' => 'nullable',
                'warna3' => 'nullable',
                'penggunaan' => 'required',
                'keterangan' => 'required',
            ]);

            if ($validator->fails()) {
                return back()
                ->with('info', 'Data Tidak Valid/Masih Ada Yang Kosong');
            } else {
                Produk::where('id', $request->id)->update([
                    'merek' => $request->merek,
                    'tipe' => $request->tipe,
                    'harga' => $request->harga,
                    'warna1' => $request->warna1,
                    'warna2' => $request->warna2,
                    'warna3' => $request->warna3,
                    'penggunaan' => $request->penggunaan,
                    'keterangan' => $request->keterangan,
                ]);

                return redirect('/admin/produk')
                ->with('info', 'Produk Telah Berhasil Diedit');   
            }
        } else {
            dd($user);
        } 
    }

    public function checkPesanan($id){
        $user = auth()->guard('admin')->user();
        if ($user) {
            $pesanan = Pesanan::join('produks', 'pesanans.id_barang', '=', 'produks.id')
            ->select('pesanans.*', 'produks.gambar')
            ->where('id_pemesan', $id)            
            ->get();           

            $jml = DB::table('pesanans')
            ->select(DB::raw('SUM(total_harga) as total'))
            ->where('id_pemesan', $id)
            ->get();

            $pemesan = User::where('id', $id)->get();

            return view('admin.pesanan', ['pesanan' => $pesanan, 'jml' => $jml, 'pemesan' => $pemesan]);
        } else {
            dd($user);
        }
    }

    public function checkout() {
        $user = auth()->guard('admin')->user();
        if ($user) {
            $check = Checkout::join('users', 'users.id', '=', 'checkouts.id_pembeli')        
            ->select('checkouts.*', 'users.name')  
            ->orderBy('checkouts.id', 'DESC')          
            ->get();
            return view('admin.checkout',['check' => $check]);
        } else {
            dd($user);
        }        
    }

    public function checkCheckout($id){
        $user = auth()->guard('admin')->user();
        if ($user) {
            $time = Checkout::select('updated_at')
            ->where('id', $id)
            ->pluck('updated_at');

            $checkout = Checkout::where('id', $id)
            ->get();
            
            $pesanan = Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
            ->where('checkouts.id', $id)
            ->where('pesanans.updated_at', $time)      
            ->get();

            $pengiriman = Pengiriman::where('id_checkout', $id)
            ->get();

            $jumlah = Checkout::where('id', $id)
            ->get();

            return view('admin.lihat-checkout', ['pesanan' => $pesanan, 'jumlah' => $jumlah, 'pengiriman' => $pengiriman, 'checkout' => $checkout]);
        } else {
            dd($user);
        }
    }

    public function tolakCheckout(Request $request){
        $user = auth()->guard('admin')->user();
        if ($user) {         
            $det = DB::table('checkouts')
            ->join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
            ->where('checkouts.id', $request->id_tolak)
            ->get();

            $time = Checkout::select('updated_at')
            ->where('id', $request->id_tolak)
            ->pluck('updated_at');

            Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
            ->where('checkouts.id', $request->id_tolak)
            ->where('pesanans.id_pemesan', $request->id_pemesan)
            ->where('pesanans.updated_at', $time)
            ->update([
                'checkouts.status' => $request->tolak,
                'pesanans.status' => $request->tolak,
                'pesanans.updated_at' => Carbon::now()->toDateTimeString(),
            ]);

            return back()
            ->with('info', 'Checkout Ditolak');
        } else {
            dd($user);
        }   
    }

    public function setujuiCheckout(Request $request){
        $user = auth()->guard('admin')->user();
        if ($user) {
            $det = DB::table('checkouts')
            ->join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
            ->where('checkouts.id', $request->id_setuju)
            ->get();

            $time = Checkout::select('updated_at')
            ->where('id', $request->id_setuju)
            ->pluck('updated_at');

            Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
            ->where('checkouts.id', $request->id_setuju)
            ->where('pesanans.id_pemesan', $request->id_pemesan)
            ->where('pesanans.updated_at', $time)
            ->update([
                'checkouts.status' => $request->setuju,
                'pesanans.status' => $request->setuju,
                'pesanans.updated_at' => Carbon::now()->toDateTimeString(),
            ]);

            return back()
            ->with('info', 'Checkout Disetujui');
        } else {
            dd($user);
        }   
    }

    public function pengiriman(Request $request){
        $user = auth()->guard('admin')->user();
        if ($user) {            

            $processexist = Pengiriman::select('*')
            ->where('id_checkout', $request->id_pengiriman)
            ->first();

            if($processexist == null) {
                $kirim = Pengiriman::create([
                    'id_checkout' => $request->id_pengiriman,
                    'resi' => $request->resi,
                    'link_resi' => $request->link_resi,            
                ]);

                $time = Checkout::select('updated_at')
                ->where('id', $request->id_checkout)
                ->pluck('updated_at');

                Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
                ->where('checkouts.id', $request->id_checkout)
                ->where('pesanans.updated_at', $time)
                ->update([
                    'checkouts.status' => 'Dikirim',
                    'pesanans.status' => 'Dikirim',
                    'pesanans.updated_at' => Carbon::now()->toDateTimeString(),
                ]);

                return back()
                ->with('info', 'Pengiriman Telah Ditambah');
            }
            else {
                $kirimAda = Pengiriman::where('id_checkout', $request->id_pengiriman)
                ->update([
                    'resi' => $request->resi,
                    'link_resi' => $request->link_resi,
                ]);

                $time = Checkout::select('updated_at')
                ->where('id', $request->id_checkout)
                ->pluck('updated_at');

                Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
                ->where('checkouts.id', $request->id_checkout)
                ->where('pesanans.updated_at', $time)
                ->update([
                    'checkouts.status' => 'Dikirim',
                    'pesanans.status' => 'Dikirim',
                    'pesanans.updated_at' => Carbon::now()->toDateTimeString(),
                ]);

                return back()
                ->with('info', 'Pengiriman Telah Diedit');
            }            
        } else {
            dd($user);
        }   
    }

    public function sampai(Request $request){
        $user = auth()->guard('admin')->user();
        if ($user) {
            $det = DB::table('checkouts')
            ->join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
            ->where('checkouts.id', $request->id_sampai)
            ->get();

            $time = Checkout::select('updated_at')
            ->where('id', $request->id_sampai)
            ->pluck('updated_at');

            Checkout::join('pesanans', 'checkouts.updated_at', '=', 'pesanans.updated_at')
            ->where('checkouts.id', $request->id_sampai)
            ->where('pesanans.updated_at', $time)
            ->update([
                'checkouts.status' => $request->sampai,
                'pesanans.status' => $request->sampai,
                'pesanans.updated_at' => Carbon::now()->toDateTimeString(),
            ]);

            return back()
            ->with('info', 'Status Pesanan Diganti Menjadi Sampai');
        } else {
            dd($user);
        }   
    }
}