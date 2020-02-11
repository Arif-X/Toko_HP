<?php

// Guest Route
Route::get('/', 'HomepageController@index');
Route::get('/produk', 'ProdukController@index');
Route::get('/produk/merek/{merek}', 'ProdukController@filterMerek');
Route::get('/produk/merek-lain', 'ProdukController@filterMerekLain');
Route::get('/produk/kondisi/{penggunaan}', 'ProdukController@filterKondisi');
Route::get('/produk/cari','ProdukController@filterNama');

// User Auth Route
Auth::routes();

// Checkout & Sending Status
Route::get('/pengiriman/{id}', 'PengirimanController@pengirimanIndex');
Route::post('/admin/checkout/konfirmasi-pengiriman', 'Auth\AdminController@pengiriman');

// User Route
Route::get('/pesanan', 'PesananController@index');
Route::get('/pesan/produk/{id}', 'PesananController@pesan');
Route::post('/pesan/tambah/form', 'PesananController@tambahPesanan');
Route::get('/pesanan/update/{id}', 'PesananController@updatePesananGet');
Route::post('/pesanan/update-pesanan/update', 'PesananController@updatePesananPost');
Route::post('/pesanan/hapus', 'PesananController@deletePesanan');
Route::get('/checkout', 'CheckoutController@index');
Route::post('/checkout/store', 'CheckoutController@checkoutPost');
Route::get('/user', 'UserController@index');
Route::post('/user/data/update', 'UserController@update');
Route::post('/user/foto/update', 'UserController@updateFoto');
Route::post('/pesanan/konfirmasi-penerimaan', 'PesananController@konfirmasiPenerimaan');

// Home Route
Route::get('/home', 'HomeController@index')->name('home');

// Coba Query
Route::get('/coba-query', 'CobaController@cobaquery');

// Admin Product Route
Route::get('/admin/home', 'Auth\AdminController@dashboard');
Route::get('/admin/produk', 'Auth\AdminController@produk');
Route::get('/admin/produk/merek/{merek}', 'Auth\AdminController@merek');
Route::get('/admin/produk/tambah', 'Auth\AdminController@addProductGet');
Route::post('/admin/produk/tambah/add', 'Auth\AdminController@addProductPost');
Route::get('/admin/produk/edit/{id}', 'Auth\AdminController@updateProductGet');
Route::post('/admin/produk/edit/edit-produk', 'Auth\AdminController@updateProductPost');
Route::post('/admin/produk/edit/edit-gambar-produk', 'Auth\AdminController@updateProductImagePost');

// Admin Check Route
Route::get('/admin/checkout', 'Auth\AdminController@checkout');
Route::post('/admin/checkout/tolak', 'Auth\AdminController@tolakCheckout');
Route::post('/admin/checkout/setuju', 'Auth\AdminController@setujuiCheckout');
Route::get('/admin/pesanan/user/{id}', 'Auth\AdminController@checkPesanan');
Route::get('/admin/checkout/id/{id}', 'Auth\AdminController@checkCheckout');
Route::post('/admin/checkout/set-sampai', 'Auth\AdminController@sampai');

// Admin API Route
Route::get('admin-login','Auth\AdminController@showLoginForm');
Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'Auth\AdminController@login']);
Route::get('admin-register','Auth\AdminController@showRegisterPage');
Route::post('admin-register', 'Auth\AdminController@register')->name('admin.register');
