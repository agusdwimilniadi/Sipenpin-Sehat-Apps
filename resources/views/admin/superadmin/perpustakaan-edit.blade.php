@extends('admin.core.core-dashboard')
@section('onPage', 'Edit Perpustakaan')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Perpustakaan</h6>
            </div>          
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/back-perpustakaan')}}/{{$dataPerpustakaan->id}}}/update">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="judul_buku" class="ml-1">Judul Buku :</label>
                    <input type="text" class="form-control  @error('judul_buku') is-invalid @enderror" name="judul_buku" placeholder="Judul Buku..." value="{{$dataPerpustakaan->judul}}">
                    @error('judul_buku')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_singkat" class="ml-1">Deskripsi Singkat :</label>
                    <textarea placeholder="Deskripsi Singkat....." name="deskripsi_singkat" class="form-control  @error('deskripsi_singkat') is-invalid @enderror">{{$dataPerpustakaan->deskripsi_singkat}}</textarea>
                    @error('deskripsi_singkat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="file_buku">File Buku</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file_buku" id="input_buku" aria-describedby="file_buku" @error('file_buku') is-invalid @enderror">
                            <label class="custom-file-label" for="input_buku">Choose File...</label>
                        </div>
                        @error('file_buku')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="deskripsi_singkat" class="ml-1">Buku Lama :</label>
                    <a href="{{url('upload/perpustakaan/'.$dataPerpustakaan->file_buku)}}">
                        <button type="button" type="submit" class="btn btn-info"><i class="fa fa-file-download"></i></button>
                    </a>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Buku</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection