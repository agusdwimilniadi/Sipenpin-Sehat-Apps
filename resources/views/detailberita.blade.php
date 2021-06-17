@extends('layouts.app')
@section('title')
    Berita
@endsection
@section('content')


    <section class="container " style="text-align: left;padding:30px">
        <h1>{{$berita->judul}}</h1>
        <br>
        <div class="row">
            <div class="col-6">
                
                <p><i class="fas fa-user rounded-circle"></i>    Admin</p>
            </div>
            <div class="col-6"style="text-align: right">
                {{$berita->created_at->format('d-M-Y')}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 card-image" style="text-align: center; border-radius: 30%">
                <img src="{{asset('upload/berita/'.$berita->gambar)}}" alt="" style="width: 100%">
            </div>
        </div>
        <br>
        <div class="mt-2 mb-2">
            {{$berita->deskripsi}}
        </div>
        <br>
        <a href="/berita" class="btn btn-primary" style="background-color: #48C1F0; border-color:unset;border-radius: 30px">Kembali</a>
    </section>
    
@endsection