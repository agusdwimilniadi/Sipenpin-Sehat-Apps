@extends('layouts.app')
@section('title')
    Perpustakaan
@endsection

@section('content')
    <div class="row">

      @foreach ($perpustakaans as $perpustakaan)
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$perpustakaan->judul}}</h5>
              <p class="card-text">{!!Str::limit($perpustakaan->deskripsi_singkat, $limit=150, $end="...")!!}</p>
              <a href="{{url('upload/perpustakaan/'.$perpustakaan->file_buku)}}" class="btn btn-primary" > Unduh buku</a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
@endsection