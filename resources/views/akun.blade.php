@extends('layouts.app')
@section('title')
    SIPENPIN SEHAT
@endsection

@section('content')
    <h3>Haloo... {{Auth::user()->name}}</h3>
    <br>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 text-center">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Nama</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly placeholder="{{Auth::user()->name}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10 text-center">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Email</span>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly placeholder="{{Auth::user()->email}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Keluar</button>
            </form>
        </div>
    </div>
    
@endsection