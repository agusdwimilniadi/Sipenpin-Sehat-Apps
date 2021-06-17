@extends('admin.core.core-dashboard')
@section('onPage', 'Perawat')

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
              <h6 class="m-0 font-weight-bold text-primary">Form Master Perawat</h6>
            </div>          
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/back-master/perawat/save')}}">
                @csrf
                <div class="form-group">
                    <label for="nama_perawat" class="ml-1">Nama Perawat :</label>
                    <input type="text" class="form-control  @error('nama_perawat') is-invalid @enderror" name="nama_perawat" placeholder="Nama Perawat..." value="{{old('nama_perawat')}}">
                    @error('nama_perawat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomor_perawat" class="ml-1">Nomor HP/WhatsApp Perawat :</label>
                    <input type="text" class="form-control  @error('nomor_perawat') is-invalid @enderror" name="nomor_perawat" placeholder="Nomor Perawat..." value="{{old('nomor_perawat')}}">
                    @error('nomor_perawat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Perawat</span>
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
              <h6 class="m-0 font-weight-bold text-primary">List Perawat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama Jenis Dusun</center></th>
                                <th><center>Nomor Perawat</center></th>
                                <th><center>Status Perawat</center></th>
                                <th><center>Aksi</center></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPerawat as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->nama_perawat}}</center></td>
                                <td class="align-middle"><center>{{$item->nomor_perawat}}</center></td>
                                <td class="align-middle"><center>
                                @if ($item->is_perawat == 1)
                                    Aktif
                                    @else
                                    Tidak Aktif
                                @endif</center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-master/perawat')}}/{{$item->id}}/drop" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/back-master/perawat')}}/{{$item->id}}/perawatActive" method="POST" class="d-inline">
                                        @method('patch')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary btn-circle">
                                            @if ($item->is_perawat == 1)
                                                <i class="fas fa-toggle-on"></i>
                                                @else
                                                <i class="fas fa-toggle-off"></i>
                                            @endif
                                            
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