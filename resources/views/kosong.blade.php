@extends('layouts.produk-layout')

@section('content')

<main role="main">  

    <div id="tidakada" class="container-fluid shadow-lg">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk Kosong</li>
            </ol>
        </nav>
        
        <div class="flex-center position-ref full-height">
            <div class="code">
                Maaf            </div>

            <div class="message" style="padding: 10px;">
                Produk Kosong            </div>
        </div>
    </div>

</main>

@endsection