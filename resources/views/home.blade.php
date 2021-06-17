@extends('layouts.app')
{{-- 
--warna1: #333399;
--warna2: #3399FF;
--warna3: #FFFFFF;
--warna4: #3366CC; --}}
@section('title')
    SIPENPIN SEHAT
@endsection
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('carousel/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
		<link rel="stylesheet" href="{{asset('carousel/css/style1.css')}}">
    <div class="card-body">
        <h4 class="text-left font-weight-bold sipenpin-subtitle" style="margin-top: -10px; margin-left: -10px">Pelayanan</h4>
        <br>
        <div class="row">
            <div class="col-4 text-center">
                <a href="/pendataan"   >
                    <img src="{{asset('image/menu/1.svg')}}" alt="" srcset="" style="width: 100%"><br>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="/konsultasi"   >
                    <img src="{{asset('image/menu/2.svg')}}" alt="" srcset="" style="width: 100%"><br>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="/beratbadan"   >
                    <img src="{{asset('image/menu/3.svg')}}" alt="" srcset="" style="width: 100%"><br>
                </a>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-4 text-center">
                <a href="/statistika"   >
                    <img src="{{asset('image/menu/4.svg')}}" alt="" srcset="" style="width: 100%"><br>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="/perpustakaan"   >
                    <img src="{{asset('image/menu/5.svg')}}" alt="" srcset="" style="width: 100%"><br>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="/calldarurat"   >
                    <img src="{{asset('image/menu/6.svg')}}" alt="" srcset="" style="width: 100%"><br>
                </a>
            </div>
        </div>
        <br>
    </div>
@endsection
@section('under-content')
<section class="ftco-section " style="margin-top: -150px">
  <div class="container">
    <div class="row rounded">
      <div class="col-md-12 text-center rounded" >
        <h2 class="heading-section mb-5 pb-md-4"><h3 class="text-left font-weight-bold sipenpin-subtitle rounded" style="margin-left: 20px">Berita Terbaru</h3></h2>
        <br>
      </div>
      <div class="col-md-12 " style="border-radius: 10px ">
        <div class="featured-carousel owl-carousel " style="border-radius: 10px ">
          
          @foreach ($beritas as $berita)
            <div class="item " style="border-radius: 10px ">
              <div class="blog-entry " style="border-radius: 10px ">
                <a href="#" class="block-20 d-flex align-items-start" style="height: 70%;background-image: url('{{asset('upload/berita/'.$berita->gambar)}}'); border-radius: 10px 10px 0 0 ">
                  <div class="meta-date text-center p-2 " style="border-top-left-radius: 10px">
                    <span class="day">{{$berita->updated_at->format('d')}}</span>
                    <span class="mos">{{$berita->updated_at->format('M')}}</span>
                    <span class="yr">{{$berita->updated_at->format('Y')}}</span>
                  </div>
                </a>
                <div class="text border border-top-0 p-2 " style="border-radius: 0 0 10px 10px ">
                  <h3 class="heading " style="text-align: left;font-family: 'Mulish', sans-serif;"><a href="#" style="font-size: 70%;">{{$berita->judul}}.</p>
                  <div class="d-flex align-items-center mt-4 ">
                    <p class="mb-0 "><a href="/detailberita/{{$berita->id}}" class="btn btn-primary">Baca Selengkapnya <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <p class="ml-auto meta2 mb-0 ">
                      <a href="#" class="mr-2">Admin</a>
                      <a href="#" class="meta-chat"><span class="fas fa-user"></span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
      
    </div>
  </div>
</section>
<script src="{{asset('carousel/js/jquery.min.js')}}"></script>
<script src="{{asset('carousel/js/popper.js')}}"></script>
<script src="{{asset('carousel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('carousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('carousel/js/main.js')}}"></script>

<br>
<br>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('vendor/font-awesome/js/all.js')}}"></script>
<script src="{{asset('vendor/owl/dist/owl.carousel.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
@endsection
                    

