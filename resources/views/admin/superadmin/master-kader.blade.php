@extends('admin.core.core-dashboard')
@section('onPage', 'Kader')

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
              <h6 class="m-0 font-weight-bold text-primary">Form Master kader</h6>
            </div>          
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/back-master/kader/save')}}">
                @csrf
                <div class="form-group">
                    <label for="nama_kader" class="ml-1">Nama kader :</label>
                    <input type="text" class="form-control  @error('nama_kader') is-invalid @enderror" name="nama_kader" placeholder="Nama kader..." value="{{old('nama_kader')}}">
                    @error('nama_kader')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomor_kader" class="ml-1">Nomor HP/WhatsApp kader :</label>
                    <input type="text" class="form-control  @error('nomor_kader') is-invalid @enderror" name="nomor_kader" placeholder="Nomor kader..." value="{{old('nomor_kader')}}">
                    @error('nomor_kader')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_awal" class="ml-1">Jam Buka (WIB) :</label>
                    <input type="time" class="form-control  @error('jam_awal') is-invalid @enderror" name="jam_awal" placeholder="Nomor Bidan..." value="{{old('jam_awal')}}">
                    @error('jam_awal')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jam_akhir" class="ml-1">Jam Tutup (WIB) :</label>
                    <input type="time" class="form-control  @error('jam_akhir') is  -invalid @enderror" name="jam_akhir" placeholder="Nomor Bidan..." value="{{old('jam_akhir')}}">
                    @error('jam_akhir')
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
                        <span class="text">Simpan kader</span>
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
              <h6 class="m-0 font-weight-bold text-primary">List Kader</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama Jenis Dusun</center></th>
                                <th><center>Nomor Kader</center></th>
                                <th><center>Jam Beroprasi</center></th>
                                <th><center>Status Kader</center></th>
                                <th><center>Aksi</center></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listKader as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->nama_kader}}</center></td>
                                <td class="align-middle"><center>{{$item->nomor_kader}}</center></td>
                                <td class="align-middle"><center>{{$item->jam_awal}}-{{$item->jam_akhir}} WIB</center></td>
                                <td class="align-middle"><center>
                                @if ($item->is_active == 1)
                                    Aktif
                                    @else
                                    Tidak Aktif
                                @endif</center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-master/kader')}}/{{$item->id}}/drop" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{url('/back-master/kader')}}/{{$item->id}}/kaderActive" method="POST" class="d-inline">
                                        @method('patch')
                                        @csrf
                                            @if ($item->is_active == 1)
                                                <button type="submit" class="btn btn-sm btn-primary btn-circle">
                                                    <i class="fas fa-toggle-on"></i>
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-sm btn-outline-primary btn-circle">
                                                    <i class="fas fa-toggle-off"></i>
                                                </button>
                                            @endif
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