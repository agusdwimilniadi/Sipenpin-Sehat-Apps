@extends('admin.core.core-dashboard')
@section('onPage', 'Berita')

@section('extraCSS')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    @if (session('success'))
        <div class="alert alert-success sb-alert-icon m-3 w-100" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="sb-alert-icon-content">
                {{session('success')}}
            </div>
        </div>
    @elseif (session('failed'))
        <div class="alert alert-danger sb-alert-icon m-3 w-100" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="sb-alert-icon-content">
                {{session('failed')}}
            </div>
        </div>
    @endif
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Berita</h6>
            </div>          
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/back-berita/save')}}">
                @csrf
                <div class="form-group">
                    <label for="judul_berita" class="ml-1">Judul Berita :</label>
                    <input type="text" class="form-control  @error('judul_berita') is-invalid @enderror" name="judul_berita" placeholder="Judul Berita..." value="{{old('judul_berita')}}">
                    @error('judul_berita')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_berita" class="ml-1">Deskripsi Berita :</label>
                    <textarea placeholder="Deskripsi Berita....." name="deskripsi_berita" class="form-control" cols="50" rows="10"  @error('deskripsi_berita') is-invalid @enderror style="white-space: pre-wrap">{{old('deskripsi_berita')}}</textarea>
                    
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
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Berita</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Judul</center></th>
                                <th class="w-50"><center>Deskripsi</center></th>
                                <th><center>Gambar</center></th>
                                <th><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listBerita as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->judul}}</center></td>
                                <td class="align-middle"><center>{{Str::limit($item->deskripsi, $limit=150, $end="...")}}</center></td>
                                <td class="align-middle"><center><img src="{{asset('upload/berita/'.$item->gambar)}}" style="width: 100px;"></center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-berita')}}/{{$item->id}}/edit" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form>
                                    |
                                    <form action="{{url('/back-berita')}}/{{$item->id}}/drop" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </center></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection

@section('extraJS')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection