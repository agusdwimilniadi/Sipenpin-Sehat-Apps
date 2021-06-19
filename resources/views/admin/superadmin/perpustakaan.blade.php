@extends('admin.core.core-dashboard')
@section('onPage', 'Perpustakaan')

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
              <h6 class="m-0 font-weight-bold text-primary">Form Judul Buku</h6>
            </div>          
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/back-perpustakaan/save')}}">
                @csrf
                <div class="form-group">
                    <label for="judul_buku" class="ml-1">Judul Buku :</label>
                    <input type="text" class="form-control  @error('judul_buku') is-invalid @enderror" name="judul_buku" placeholder="Judul Buku..." value="{{old('judul_buku')}}">
                    @error('judul_buku')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_singkat" class="ml-1" >Deskripsi Singkat :</label>
                    
                    <textarea id="summernotess" cols="50" rows="10" placeholder="Deskripsi Singkat....." name="deskripsi_singkat" class="form-control  @error('deskripsi_singkat') is-invalid @enderror">{{old('deskripsi_singkat')}}</textarea>
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
                                <th><center>File</center></th>
                                <th><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPerpustakaan as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->judul}}</center></td>
                                <td class="align-middle"><center>{!!Str::limit($item->deskripsi_singkat, $limit=150, $end="...")!!}</center></td>
                                <td class="align-middle"><center>
                                    <a href="{{url('upload/perpustakaan/'.$item->file_buku)}}">
                                        <button type="button" type="submit" class="btn btn-info"><i class="fa fa-file-download"></i></button>
                                    </a>
                                </center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-perpustakaan')}}/{{$item->id}}/edit" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form>
                                    |
                                    <form action="{{url('/back-perpustakaan')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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