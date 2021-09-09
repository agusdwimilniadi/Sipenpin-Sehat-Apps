@extends('layouts.app')
@section('title')
    Call Darurat
@endsection
@section('content')
<div class="card-body">
    <h4 class="text-left font-weight-bold sipenpin-subtitle" style="margin-top: -10px; margin-left: -10px">Hubungi</h4>
    <br>

    <div class="row">
        <div class="col-6 text-center">
            <a href="tel:{{$nomor_kades_aktif->nomor_kades}}"   >
                <img src="{{asset('image/menu/cal-3.svg')}}" alt="" srcset="" style="width: 100%"><br>
            </a>
        </div>
        <div class="col-6 text-center">
            <a href="tel:{{$nomor_kader_aktif->nomor_kader}}" >
                <img src="{{asset('image/menu/cal-4.svg')}}" alt="" srcset="" style="width: 100%"><br>
            </a>
        </div>
    </div>
</div>
@endsection