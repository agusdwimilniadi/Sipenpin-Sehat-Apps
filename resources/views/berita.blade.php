@extends('layouts.app')
@section('title')
Berita Terbaru
@endsection
@section('content')
<style>
    /*  Helper Styles */
    body {
        font-family: Varela Round;
        background: #f1f1f1;
    }

    a {
        text-decoration: none;
    }

    /* Card Styles */

    .card-sl {
        border-radius: 8px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .card-image img {
        max-height: 100%;
        max-width: 100%;
        border-radius: 8px 8px 0px 0;
    }

    .card-action {
        position: relative;
        float: right;
        margin-top: -25px;
        margin-right: 20px;
        z-index: 2;
        color: #E26D5C;
        background: #fff;
        border-radius: 100%;
        padding: 15px;
        font-size: 15px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.19);
    }

    .card-action:hover {
        color: #fff;
        background: #E26D5C;
        -webkit-animation: pulse 1.5s infinite;
    }

    .card-heading {
        font-size: 18px;
        font-weight: bold;
        background: #fff;
        padding: 10px 15px;
    }

    .card-text {
        padding: 10px 15px;
        background: #fff;
        font-size: 14px;
        color: #636262;
    }

    .card-button {
        display: flex;
        justify-content: center;
        padding: 10px 0;
        width: 100%;
        background-color: #48C1F0;
        color: #fff;
        border-radius: 0 0 8px 8px;
    }

    .card-button:hover {
        text-decoration: none;
        background-color: #48C1F0;
        color: #fff;

    }


    @-webkit-keyframes pulse {
        0% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }

        70% {
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            transform: scale(1);
            box-shadow: 0 0 0 50px rgba(90, 153, 212, 0);
        }

        100% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
            box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
        }
    }


    .page-item.active .page-link {
        background-color: #48C1F0;
        border: #48C1F0
    }
</style>

@foreach ($beritas as $berita)
<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <img class="card-img-top" src="{{asset('upload/berita/'.$berita->gambar)}}" alt="Card image cap" style="max-width: 100%;height: 200px;object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{$berita->judul}}</h5>
                    <p class="card-text">{!!Str::limit($berita->deskripsi, $limit=50, $end="...")!!}</p>
                    <a href="/detailberita/{{$berita->id}}" class="btn btn-outline-dark btn-sm">Baca Berita</a>
                </div>
            </div>
        </div>

    </div>
</div>

@endforeach

<div class="d-flex justify-content-center mt-3">
    {{ $beritas->links('pagination::bootstrap-4') }}
</div>


@endsection

@section('under-content')

@endsection