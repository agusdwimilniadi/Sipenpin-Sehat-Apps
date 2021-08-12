@extends('admin.core.core-dashboard')
@section('onPage')
@section('content')
<div class="row">
    <div class="col-md-12" style="text-align: center">
        <h1>Cara Balas Live Chat</h1>
        <ul>
            <li>1. Klik <a href="https://app.crisp.chat/initiate/login/">link Ini</a> Untuk login ke Website</li>
            <li>2. Login menggunakan Email dan Password tenaga kesehatan</li>
            <li>3. Setelah login silahkan balas chat seperti gambar dibawah ini</li>
            <li><img src="{{asset('images/tutorial.png')}}" height="350px" alt=""></li>
            <li>4. Untuk yang menggunakan handphone bisa download Aplikasi nya lewat <a href="https://get.crisp.chat/download/android/"> Link Ini</a></li>
            <li>5. Lalu login menggunakan email yang sama</li>
        </ul>
    </div>
</div>
    
@endsection