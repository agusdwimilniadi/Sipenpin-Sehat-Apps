@extends('admin.core.core-dashboard')
@section('onPage', 'User')

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
              <h6 class="m-0 font-weight-bold text-primary">Form Data User/Admin</h6>
            </div>          
            <form class="card-body" method="POST" action="{{url('/back-user/save')}}">
                @csrf
                <div class="form-group">
                    <label for="full_name" class="ml-1">Nama Lengkap :</label>
                    <input type="text" class="form-control  @error('full_name') is-invalid @enderror" name="full_name" placeholder="Nama Lengkap..." value="{{old('full_name')}}">
                    @error('full_name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="ml-1">Email :</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email..." value="{{old('email')}}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="ml-1">Password :</label>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password..." value="{{old('password')}}">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirm" class="ml-1">Konfirmasi Password :</label>
                            <input type="password" class="form-control  @error('password_confirm') is-invalid @enderror" name="password_confirm" placeholder="Konfirmasi Password..." value="{{old('password_confirm')}}">
                            @error('password_confirm')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="roled" class="ml-1"><strong>Role :</strong></label>
                    <select class="custom-select" name="roled">
                        <option value="2" @if(old('roled') == 2) selected @endif>Admin Kesehatan</option>
                        <option value="3" @if(old('roled') == 3) selected @endif>Admin Kader</option>
                        <option value="4" @if(old('roled') == 4) selected @endif>User</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan User</span>
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
              <h6 class="m-0 font-weight-bold text-primary">List Akun - User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableUser" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Email</center></th>
                                <th><center>Dibuat</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUserUser as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->name}}</center></td>
                                <td class="align-middle"><center>{{$item->email}}</center></td>
                                <td class="align-middle"><center>{{$item->created_at}}</center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-user')}}/{{$item->id}}/reset" method="POST" class="d-inline">
                                        @method('patch')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-dark btn-circle" onclick="return confirm('Reset Password ?')">
                                            <i class="fas fa-history"></i>
                                        </button>
                                    </form> |
                                    <form action="{{url('/back-user')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Akun - Admin Kesehatan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableKesehatan" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Email</center></th>
                                <th><center>Dibuat</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUserKesehatan as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->name}}</center></td>
                                <td class="align-middle"><center>{{$item->email}}</center></td>
                                <td class="align-middle"><center>{{$item->created_at}}</center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-user')}}/{{$item->id}}/reset" method="POST" class="d-inline">
                                        @method('patch')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-dark btn-circle" onclick="return confirm('Reset Password ?')">
                                            <i class="fas fa-history"></i>
                                        </button>
                                    </form> |
                                    <form action="{{url('/back-user')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Akun - Admin Kesehatan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableKader" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Email</center></th>
                                <th><center>Dibuat</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listUserKader as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center>{{$item->name}}</center></td>
                                <td class="align-middle"><center>{{$item->email}}</center></td>
                                <td class="align-middle"><center>{{$item->created_at}}</center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/back-user')}}/{{$item->id}}/reset" method="POST" class="d-inline">
                                        @method('patch')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-dark btn-circle" onclick="return confirm('Reset Password ?')">
                                            <i class="fas fa-history"></i>
                                        </button>
                                    </form> |
                                    <form action="{{url('/back-user')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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
        $('#dataTableUser').DataTable();
        $('#dataTableKesehatan').DataTable();
        $('#dataTableKader').DataTable();
    });
</script>
@endsection