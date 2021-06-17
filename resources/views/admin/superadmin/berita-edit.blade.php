@extends('admin.core.core-dashboard')
@section('onPage', 'Edit Berita')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Berita</h6>
            </div>          
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/back-berita')}}/{{$dataBerita->id}}}/update">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="judul_berita" class="ml-1">Judul Berita :</label>
                    <input type="text" class="form-control  @error('judul_berita') is-invalid @enderror" name="judul_berita" placeholder="Judul Berita..." value="{{$dataBerita->judul}}">
                    @error('judul_berita')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_berita" class="ml-1">Deskripsi Berita :</label>
                    <textarea placeholder="Deskripsi Berita....." name="deskripsi_berita" class="form-control  @error('deskripsi_berita') is-invalid @enderror">{{$dataBerita->deskripsi}}</textarea>
                    @error('deskripsi_berita')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="fileImage">Gambar Berita</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar_berita" id="inputImage" aria-describedby="fileImage">
                            <label class="custom-file-label" for="inputImage">Choose File...</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group text-center">
                    <img src="{{asset('upload/berita/'.$dataBerita->gambar)}}" class="img-thumbnail w-25" alt="...">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Berita</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection