<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use File;

class UserController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		return view('user');
	}

	public function update(Request $request){		
		$request->validate([
			'nama' => 'required',
			'alamat' => 'required',
			'no_rek' => 'required',
			'kode_pos' => 'required',
			'no_telp' => 'required',
		]);

		$asu = DB::table('users')->where('id', Auth::user()->id)->update([
			'name' => $request->nama,
			'alamat' => $request->alamat,
			'no_rek' => $request->no_rek,
			'kode_pos' => $request->kode_pos,
			'no_hp' => $request->no_telp,
		]);

		return redirect('/user')
		->with('info', 'Data Telah Diedit'); 
	}

	public function updateFoto(Request $request){
		$request->validate([
			'foto' => 'mimes:png,jpeg,jpg|max:2048',
		]);

		$fileName = $request->file('foto')->getClientOriginalName();
        // .'.'.$request->file->extension()  

		$request->foto->move(storage_path('app/public/foto'), $fileName);

		$asu = DB::table('users')->where('id', Auth::user()->id)->update([
			'foto' => $fileName,
		]);

		return redirect('/user')
		->with('info', 'Data Telah Diedit'); 
	}
}
