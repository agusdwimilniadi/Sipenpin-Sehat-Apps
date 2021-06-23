@extends('admin.core.core-dashboard')
@section('onPage', 'Pendataan - User Detail')

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
</div>
<div class="row">
    <div class="col-12">
        <a href="{{url('/back-user-detail/add')}}">
            <button class="btn btn-primary btn-icon-split m-2 float-right">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>&nbsp;Tambah Data
                </span>
            </button>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List User Detail</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>User Utama</center></th>
                                <th><center>Nama Lengkap</center></th>
                                {{-- <th><center>Tempat Lahir</center></th>
                                <th><center>Tanggal Lahir</center></th> --}}
                                <th><center>Jenis Kelamin</center></th>
                                <th><center>Alamat - RT - RW - Dusun</center></th>
                                <th><center>NIK</center></th>
                                <th><center>Status Hubungan</center></th>
                                <th><center>Tanggal Diinput</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUserDetail as $item)
                            <tr>
                                
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->name}}</center></td>
                                <td class="align-middle"><center>{{$item->nama_lengkap}}</center></td>
                                {{-- <td class="align-middle"><center>{{$item->tempat_lahir}}</center></td>
                                <td class="align-middle"><center>{{$item->tanggal_lahir}}</center></td> --}}
                                <td class="align-middle"><center>{{$item->jenis_kelamin}}</center></td>
                                <td class="align-middle"><center>{{$item->alamat}} - {{$item->rt}} - {{$item->rw}} - {{$item->nama_dusun}}</center></td>
                                <td class="align-middle"><center>{{$item->nik}}</center></td>
                                <td class="align-middle"><center>{{$item->nama_hubungan}}</center></td>
                                <td class="align-middle"><center>{{$item->created_at}}</center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-user-detail')}}/{{$item->id}}/see" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form>

                                    <form action="{{url('/back-user-detail')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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