@extends('layouts.app')
@section('title')
    Kalkulator Sehat
@endsection
@section('content')
<div class="card-body">
    <br>

    <div class="row">
        <div class="col-6 text-center">
            <a href="/beratbadan"   >
                <img src="{{asset('image/icon/beratBadan.svg')}}" alt="" srcset="" style="width: 100%"><br>
            </a>
        </div>
        <div class="col-6 text-center">
            <a href="/tekanandarah" >
                <img src="{{asset('image/icon/darah.svg')}}" alt="" srcset="" style="width: 100%"><br>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-3 text-center">
        </div>
        <div class="col-6 text-center">
            <a href="/cekoksigen" >
                <img src="{{asset('image/icon/oxygen.svg')}}" alt="" srcset="" style="width: 100%"><br>
            </a>
        </div>
    </div>
</div>
@endsection