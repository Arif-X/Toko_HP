@extends('layouts.admin.admin-dashboard')

@section('content')
<div id="dashboard">
    <div class="card mx-auto text-center">
        <div class="card-header">
            <strong>Dashboard</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6" style="padding-bottom: 10px;">
                    <a href="/admin/checkout">
                        <div class="card mx-auto text-center">
                            <div class="icon text-center">
                                <i class="dashboard-icon ion-ios-book"></i>
                            </div>
                            <div class="text-center">
                                <strong>Daftar Checkout</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="/admin/produk">
                        <div class="card mx-auto text-center">
                            <div class="icon text-center">
                                <i class="dashboard-icon ion-android-apps"></i>
                            </div>
                            <div class="text-center">
                                <p><strong>Daftar Produk</strong></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection