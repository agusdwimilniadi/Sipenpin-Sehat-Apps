@extends('admin.core.core-dashboard')
@section('onPage', 'Tambah Pendataan')
@section('content')
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<form method="POST" enctype="multipart/form-data" action="{{url('/back-user-detail/save')}}">
@csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Identitas Diri</h6>
                </div>          
                <div class="card-body">
                    <div class="form-group">
                        <label for="kepala_user" class="ml-1"><strong>Kepala User (User Utama) :</strong></label>
                        <select class="custom-select" name="kepala_user">
                            @foreach ($listUser as $item)
                            <option value="{{$item->id}}" @if(old('kepala_user') == $item->id) selected @endif>{{$item->name}} - {{$item->email}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap" class="ml-1"><strong>Nama Lengkap :</strong></label>
                        <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder="Nama Lengkap..."value="{{old('nama_lengkap')}}">
                        @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tempat_lahir" class="ml-1"><strong>Tempat Lahir :</strong></label>
                                <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="Tempat Lahir..."value="{{old('tempat_lahir')}}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir" class="ml-1"><strong>Tanggal Lahir :</strong></label>
                                <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Tempat Lahir..."value="{{old('tanggal_lahir')}}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin" class="ml-1"><strong>Jenis Kelamin :</strong></label><br>
                        <div class="form-check form-check-inline ml-1">
                            <input class="form-check-input" id="jk_laki_yes" type="radio" name="jenis_kelamin" value="Laki-laki" @if(old('jenis_kelamin') == "Laki-laki") checked @endif>
                            <label class="form-check-label" for="jk_laki_yes">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline ml-1">
                            <input class="form-check-input" id="jk_perempuan_yes" type="radio" name="jenis_kelamin" value="Perempuan" @if(old('jenis_kelamin') == "Perempuan") checked @endif>
                            <label class="form-check-label" for="jk_perempuan_yes">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="alamat" class="ml-1"><strong>Alamat :</strong></label>
                                <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat..."value="{{old('alamat')}}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rt" class="ml-1"><strong>RT :</strong></label>
                                <input type="text" class="form-control  @error('rt') is-invalid @enderror" name="rt" placeholder="RT..."value="{{old('rt')}}">
                                @error('rt')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="rw" class="ml-1"><strong>RW :</strong></label>
                                <input type="text" class="form-control  @error('rw') is-invalid @enderror" name="rw" placeholder="RW..."value="{{old('rw')}}">
                                @error('rw')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="dusun" class="ml-1"><strong>Nama Dusun</strong></label>
                                <select class="custom-select" name="dusun">
                                    @foreach ($listDusun as $item)
                                    <option value="{{$item->id}}" @if(old('dusun') == $item->id) selected @endif>{{$item->nama_dusun}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nik" class="ml-1"><strong>NIK :</strong></label>
                                <input type="number" minlength="16" maxlength="16" class="form-control  @error('nik') is-invalid @enderror" name="nik" placeholder="Tempat Lahir..."value="{{old('nik')}}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan" class="ml-1"><strong>Pekerjaan :</strong></label>
                                <select class="custom-select" name="pekerjaan">
                                    @foreach ($listPekerjaan as $item)
                                    <option value="{{$item->id}}" @if(old('pekerjaan') == $item->id) selected @endif>{{$item->nama_pekerjaan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_hubungan" class="ml-1"><strong>Status Hubungan :</strong></label>
                                <select class="custom-select" name="status_hubungan">
                                    @foreach ($listStatusHubungan as $item)
                                    <option value="{{$item->id}}" @if(old('status_hubungan') == $item->id) selected @endif>{{$item->nama_hubungan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Riwayat Penyakit - Yang Pernah Dialami Selama 4 Bulan Terakhir</h6>
                </div>          
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_ispa" class="ml-1"><strong>Penyakit Ispa :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_ispa_yes" type="radio" name="p_ispa" value="1" @if(old('p_ispa') == "1") checked @endif>
                                    <label class="form-check-label" for="p_ispa_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_ispa_no" type="radio" name="p_ispa" value="0" @if(old('p_ispa') == "0") checked @endif>
                                    <label class="form-check-label" for="p_ispa_no">Tidak</label>
                                </div>
                                @error('p_ispa')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_muntaber" class="ml-1"><strong>Penyakit Muntaber :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_muntaber_yes" type="radio" name="p_muntaber" value="1" @if(old('p_muntaber') == "1") checked @endif>
                                    <label class="form-check-label" for="p_muntaber_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_muntaber_no" type="radio" name="p_muntaber" value="0" @if(old('p_muntaber') == "0") checked @endif>
                                    <label class="form-check-label" for="p_muntaber_no">Tidak</label>
                                </div>
                                @error('p_muntaber')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_demam_berdarah" class="ml-1"><strong>Penyakit Demam Berdarah :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_demam_berdarah_yes"  type="radio" name="p_demam_berdarah" value="1" @if(old('p_demam_berdarah') == "1") checked @endif>
                                    <label class="form-check-label" for="p_demam_berdarah_yes" >Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_demam_berdarah_no" type="radio" name="p_demam_berdarah" value="0" @if(old('p_demam_berdarah') == "0") checked @endif>
                                    <label class="form-check-label" for="p_demam_berdarah_no">Tidak</label>
                                </div>
                                @error('p_demam_berdarah')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_campak" class="ml-1"><strong>Penyakit Campak :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_campak_yes" type="radio" name="p_campak" value="1" @if(old('p_campak') == "1") checked @endif>
                                    <label class="form-check-label" for="p_campak_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_campak_no" type="radio" name="p_campak" value="0" @if(old('p_campak') == "0") checked @endif>
                                    <label class="form-check-label" for="p_campak_no">Tidak</label>
                                </div>
                                @error('p_campak')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_malaria" class="ml-1"><strong>Penyakit Malaria :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_malaria_yes" type="radio" name="p_malaria" value="1" @if(old('p_malaria') == "1") checked @endif>
                                    <label class="form-check-label" for="p_malaria_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_malaria_no" type="radio" name="p_malaria" value="0" @if(old('p_malaria') == "0") checked @endif>
                                    <label class="form-check-label" for="p_malaria_no">Tidak</label>
                                </div>
                                @error('p_malaria')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>                        
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_flu_burung" class="ml-1"><strong>Penyakit Flu Burung :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_flu_burung_yes" type="radio" name="p_flu_burung" value="1" @if(old('p_flu_burung') == "1") checked @endif>
                                    <label class="form-check-label" for="p_flu_burung_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_flu_burung_no" type="radio" name="p_flu_burung" value="0" @if(old('p_flu_burung') == "0") checked @endif>
                                    <label class="form-check-label" for="p_flu_burung_no">Tidak</label>
                                </div>
                                @error('p_flu_burung')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_covid19" class="ml-1"><strong>Penyakit Covid-19 :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_covid19_yes" type="radio" name="p_covid19" value="1" @if(old('p_covid19') == "1") checked @endif>
                                    <label class="form-check-label" for="p_covid19_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_covid19_no" type="radio" name="p_covid19" value="0" @if(old('p_covid19') == "0") checked @endif>
                                    <label class="form-check-label" for="p_covid19_no">Tidak</label>
                                </div>
                                @error('p_covid19')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_hepatitis_b" class="ml-1"><strong>Penyakit Hepatitis B :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_hepatitis_b_yes" type="radio" name="p_hepatitis_b" value="1" @if(old('p_hepatitis_b') == "1") checked @endif>
                                    <label class="form-check-label" for="p_hepatitis_b_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_hepatitis_b_no" type="radio" name="p_hepatitis_b" value="0" @if(old('p_hepatitis_b') == "0") checked @endif>
                                    <label class="form-check-label" for="p_hepatitis_b_no">Tidak</label>
                                </div>
                                @error('p_hepatitis_b')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_leptopspirosis" class="ml-1"><strong>Penyakit Leptopspirosis :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_leptopspirosis_yes" type="radio" name="p_leptopspirosis" value="1" @if(old('p_leptopspirosis') == "1") checked @endif>
                                    <label class="form-check-label" for="p_leptopspirosis_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_leptopspirosis_no" type="radio" name="p_leptopspirosis" value="0" @if(old('p_leptopspirosis') == "0") checked @endif>
                                    <label class="form-check-label" for="p_leptopspirosis_no">Tidak</label>
                                </div>
                                @error('p_leptopspirosis')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_kolera" class="ml-1"><strong>Penyakit Kolera :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_kolera_yes" type="radio" name="p_kolera" value="1" @if(old('p_kolera') == "1") checked @endif>
                                    <label class="form-check-label" for="p_kolera_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_kolera_no" type="radio" name="p_kolera" value="0" @if(old('p_kolera') == "0") checked @endif>
                                    <label class="form-check-label" for="p_kolera_no">Tidak</label>
                                </div>
                                @error('p_kolera')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_gizi_buruk" class="ml-1"><strong>Penyakit Gizi Buruk :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_gizi_buruk_yes" type="radio" name="p_gizi_buruk" value="1" @if(old('p_gizi_buruk') == "1") checked @endif>
                                    <label class="form-check-label" for="p_gizi_buruk_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_gizi_buruk_no" type="radio" name="p_gizi_buruk" value="0" @if(old('p_gizi_buruk') == "0") checked @endif>
                                    <label class="form-check-label" for="p_gizi_buruk_no">Tidak</label>
                                </div>
                                @error('p_gizi_buruk')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_jantung" class="ml-1"><strong>Penyakit Jantung :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_jantung_yes" type="radio" name="p_jantung" value="1" @if(old('p_jantung') == "1") checked @endif>
                                    <label class="form-check-label" for="p_jantung_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_jantung_no" type="radio" name="p_jantung" value="0" @if(old('p_jantung') == "0") checked @endif>
                                    <label class="form-check-label" for="p_jantung_no">Tidak</label>
                                </div>
                                @error('p_jantung')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_tbc_paru" class="ml-1"><strong>Penyakit TBC Paru :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_tbc_paru_yes" type="radio" name="p_tbc_paru" value="1" @if(old('p_tbc_paru') == "1") checked @endif>
                                    <label class="form-check-label" for="p_tbc_paru_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_tbc_paru_no" type="radio" name="p_tbc_paru" value="0" @if(old('p_tbc_paru') == "0") checked @endif>
                                    <label class="form-check-label" for="p_tbc_paru_no">Tidak</label>
                                </div>
                                @error('p_tbc_paru')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_kanker" class="ml-1"><strong>Penyakit Kanker :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_kanker_yes" type="radio" name="p_kanker" value="1" @if(old('p_kanker') == "1") checked @endif>
                                    <label class="form-check-label" for="p_kanker_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_kanker_no" type="radio" name="p_kanker" value="0" @if(old('p_kanker') == "0") checked @endif>
                                    <label class="form-check-label" for="p_kanker_no">Tidak</label>
                                </div>
                                @error('p_kanker')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_diabetes" class="ml-1"><strong>Penyakit Diabetes :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_diabetes_yes" type="radio" name="p_diabetes" value="1" @if(old('p_diabetes') == "1") checked @endif>
                                    <label class="form-check-label" for="p_diabetes_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_diabetes_no" type="radio" name="p_diabetes" value="0" @if(old('p_diabetes') == "0") checked @endif>
                                    <label class="form-check-label" for="p_diabetes_no">Tidak</label>
                                </div>
                                @error('p_diabetes')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_hepatitis_e" class="ml-1"><strong>Penyakit Hepatitis E :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_hepatitis_e_yes" type="radio" name="p_hepatitis_e" value="1" @if(old('p_hepatitis_e') == "1") checked @endif>
                                    <label class="form-check-label" for="p_hepatitis_e_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_hepatitis_e_no" type="radio" name="p_hepatitis_e" value="0" @if(old('p_hepatitis_e') == "0") checked @endif>
                                    <label class="form-check-label" for="p_hepatitis_e_no">Tidak</label>
                                </div>
                                @error('p_hepatitis_e')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_difteri" class="ml-1"><strong>Penyakit Difteri :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_difteri_yes" type="radio" name="p_difteri" value="1" @if(old('p_difteri') == "1") checked @endif>
                                    <label class="form-check-label" for="p_difteri_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_difteri_no" type="radio" name="p_difteri" value="0" @if(old('p_difteri') == "0") checked @endif>
                                    <label class="form-check-label" for="p_difteri_no">Tidak</label>
                                </div>
                                @error('p_difteri')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_chikungunya" class="ml-1"><strong>Penyakit Chikungunya :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_chikungunya_yes" type="radio" name="p_chikungunya" value="1" @if(old('p_chikungunya') == "1") checked @endif>
                                    <label class="form-check-label" for="p_chikungunya_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_chikungunya_no" type="radio" name="p_chikungunya" value="0" @if(old('p_chikungunya') == "0") checked @endif>
                                    <label class="form-check-label" for="p_chikungunya_no">Tidak</label>
                                </div>
                                @error('p_chikungunya')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_lumpuh" class="ml-1"><strong>Penyakit Lumpuh :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_lumpuh_yes" type="radio" name="p_lumpuh" value="1" @if(old('p_lumpuh') == "1") checked @endif>
                                    <label class="form-check-label" for="p_lumpuh_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_lumpuh_no" type="radio" name="p_lumpuh" value="0" @if(old('p_lumpuh') == "0") checked @endif>
                                    <label class="form-check-label" for="p_lumpuh_no">Tidak</label>
                                </div>
                                @error('p_lumpuh')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="p_lainnya" class="ml-1"><strong>Penyakit Lainnya :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_lainnya_yes" type="radio" name="p_lainnya" value="1" @if(old('p_lainnya') == "1") checked @endif>
                                    <label class="form-check-label" for="p_lainnya_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_lainnya_no" type="radio" name="p_lainnya" value="0" @if(old('p_lainnya') == "0") checked @endif>
                                    <label class="form-check-label" for="p_lainnya_no">Tidak</label>
                                </div>
                                @error('p_lainnya')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="keterangan_penyakit_lainnya" class="ml-1"><strong>Keterangan Penyakit Lainnya (Kosongi Bila Perlu) :</strong></label>
                                <input type="text" class="form-control  @error('keterangan_penyakit_lainnya') is-invalid @enderror" name="keterangan_penyakit_lainnya" placeholder="Keterangan Penyakit Lainnya..."value="{{old('keterangan_penyakit_lainnya')}}">
                                @error('keterangan_penyakit_lainnya')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Riwayat Fasilitas Kesehatan - Yang Pernah Dikunjungi Selama 4 Bulan Terakhir</h6>
                </div>          
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_rumah_sakit" class="ml-1"><strong>Rumah Sakit :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_rumah_sakit_yes" type="radio" name="t_rumah_sakit" value="1" @if(old('t_rumah_sakit') == "1") checked @endif>
                                    <label class="form-check-label" for="t_rumah_sakit_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_rumah_sakit_no" type="radio" name="t_rumah_sakit" value="0" @if(old('t_rumah_sakit') == "0") checked @endif>
                                    <label class="form-check-label" for="t_rumah_sakit_no">Tidak</label>
                                </div>
                                @error('t_rumah_sakit')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_rumah_sakit_bersalin" class="ml-1"><strong>Rumah Sakit Bersalin :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_rumah_sakit_bersalin_yes" type="radio" name="t_rumah_sakit_bersalin" value="1" @if(old('t_rumah_sakit_bersalin') == "1") checked @endif>
                                    <label class="form-check-label" for="t_rumah_sakit_bersalin_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_rumah_sakit_bersalin_no" type="radio" name="t_rumah_sakit_bersalin" value="0" @if(old('t_rumah_sakit_bersalin') == "0") checked @endif>
                                    <label class="form-check-label" for="t_rumah_sakit_bersalin_no">Tidak</label>
                                </div>
                                @error('t_rumah_sakit_bersalin')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_puskesmas_rawat_inap" class="ml-1"><strong>Puskesmas Rawat Inap :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_puskesmas_rawat_inap_yes" type="radio" name="t_puskesmas_rawat_inap" value="1" @if(old('t_puskesmas_rawat_inap') == "1") checked @endif>
                                    <label class="form-check-label" for="t_puskesmas_rawat_inap_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_puskesmas_rawat_inap_no" type="radio" name="t_puskesmas_rawat_inap" value="0" @if(old('t_puskesmas_rawat_inap') == "0") checked @endif>
                                    <label class="form-check-label" for="t_puskesmas_rawat_inap_no">Tidak</label>
                                </div>
                                @error('t_puskesmas_rawat_inap')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_puskesmas_tanpa_rawat_inap" class="ml-1"><strong>Puskesmas Tanpa Rawat Inap :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_puskesmas_tanpa_rawat_inap_yes" type="radio" name="t_puskesmas_tanpa_rawat_inap" value="1" @if(old('t_puskesmas_tanpa_rawat_inap') == "1") checked @endif>
                                    <label class="form-check-label" for="t_puskesmas_tanpa_rawat_inap_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_puskesmas_tanpa_rawat_inap_no" type="radio" name="t_puskesmas_tanpa_rawat_inap" value="0" @if(old('t_puskesmas_tanpa_rawat_inap') == "0") checked @endif>
                                    <label class="form-check-label" for="t_puskesmas_tanpa_rawat_inap_no">Tidak</label>
                                </div>
                                @error('t_puskesmas_tanpa_rawat_inap')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_puskesmas_pembantu" class="ml-1"><strong>Puskesmas Pembantu :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_puskesmas_pembantu_yes" type="radio" name="t_puskesmas_pembantu" value="1" @if(old('t_puskesmas_pembantu') == "1") checked @endif>
                                    <label class="form-check-label" for="t_puskesmas_pembantu_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_puskesmas_pembantu_no" type="radio" name="t_puskesmas_pembantu" value="0" @if(old('t_puskesmas_pembantu') == "0") checked @endif>
                                    <label class="form-check-label" for="t_puskesmas_pembantu_no">Tidak</label>
                                </div>
                                @error('t_puskesmas_pembantu')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_poliklinik" class="ml-1"><strong>Poliklinik :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_poliklinik_yes" type="radio" name="t_poliklinik" value="1" @if(old('t_poliklinik') == "1") checked @endif>
                                    <label class="form-check-label" for="t_poliklinik_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_poliklinik_no" type="radio" name="t_poliklinik" value="0" @if(old('t_poliklinik') == "1=0") checked @endif>
                                    <label class="form-check-label" for="t_poliklinik_no">Tidak</label>
                                </div>
                                @error('t_poliklinik')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_praktik_dokter" class="ml-1"><strong>Praktik Dokter :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_praktik_dokter_yes" type="radio" name="t_praktik_dokter" value="1" @if(old('t_praktik_dokter') == "1") checked @endif>
                                    <label class="form-check-label" for="t_praktik_dokter_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_praktik_dokter_no" type="radio" name="t_praktik_dokter" value="0" @if(old('t_praktik_dokter') == "0") checked @endif>
                                    <label class="form-check-label" for="t_praktik_dokter_no">Tidak</label>
                                </div>
                                @error('t_praktik_dokter')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_rumah_bersalin" class="ml-1"><strong>Rumah Bersalin :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_rumah_bersalin_yes" type="radio" name="t_rumah_bersalin" value="1" @if(old('t_rumah_bersalin') == "1") checked @endif>
                                    <label class="form-check-label" for="t_rumah_bersalin_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_rumah_bersalin_no" type="radio" name="t_rumah_bersalin" value="0" @if(old('t_rumah_bersalin') == "0") checked @endif>
                                    <label class="form-check-label" for="t_rumah_bersalin_no">Tidak</label>
                                </div>
                                @error('t_rumah_bersalin')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_praktik_bidan" class="ml-1"><strong>Praktik Bidan :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_praktik_bidan_yes" type="radio" name="t_praktik_bidan" value="1" @if(old('t_praktik_bidan') == "1") checked @endif>
                                    <label class="form-check-label" for="t_praktik_bidan_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_praktik_bidan_no" type="radio" name="t_praktik_bidan" value="0" @if(old('t_praktik_bidan') == "0") checked @endif>
                                    <label class="form-check-label" for="t_praktik_bidan_no">Tidak</label>
                                </div>
                                @error('t_praktik_bidan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_poskesdes" class="ml-1"><strong>Poskesdes :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_poskesdes_yes" type="radio" name="t_poskesdes" value="1" @if(old('t_poskesdes') == "1") checked @endif>
                                    <label class="form-check-label" for="t_poskesdes_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_poskesdes_no" type="radio" name="t_poskesdes" value="0" @if(old('t_poskesdes') == "0") checked @endif>
                                    <label class="form-check-label" for="t_poskesdes_no">Tidak</label>
                                </div>
                                @error('t_poskesdes')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_polindes" class="ml-1"><strong>Polindes :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_polindes_yes" type="radio" name="t_polindes" value="1" @if(old('t_polindes') == "1") checked @endif>
                                    <label class="form-check-label" for="t_polindes_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_polindes_no" type="radio" name="t_polindes" value="0" @if(old('t_polindes') == "0") checked @endif>
                                    <label class="form-check-label" for="t_polindes_no">Tidak</label>
                                </div>
                                @error('t_polindes')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_apotik" class="ml-1"><strong>Apotik :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_apotik_yes" type="radio" name="t_apotik" value="1" @if(old('t_apotik') == "1") checked @endif>
                                    <label class="form-check-label" for="t_apotik_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_apotik_no" type="radio" name="t_apotik" value="0" @if(old('t_apotik') == "0") checked @endif>
                                    <label class="form-check-label" for="t_apotik_no">Tidak</label>
                                </div>
                                @error('t_apotik')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_khusus_obat_jamu" class="ml-1"><strong>Tempat Khusus Obat Jamu :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_khusus_obat_jamu_yes" type="radio" name="t_khusus_obat_jamu" value="1" @if(old('t_khusus_obat_jamu') == "1") checked @endif>
                                    <label class="form-check-label" for="t_khusus_obat_jamu_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_khusus_obat_jamu_no" type="radio" name="t_khusus_obat_jamu" value="0" @if(old('t_khusus_obat_jamu') == "0") checked @endif>
                                    <label class="form-check-label" for="t_khusus_obat_jamu_no">Tidak</label>
                                </div>
                                @error('t_khusus_obat_jamu')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_posyandu" class="ml-1"><strong>Posyandu :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_posyandu_yes" type="radio" name="t_posyandu" value="1" @if(old('t_posyandu') == "1") checked @endif>
                                    <label class="form-check-label" for="t_posyandu_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_posyandu_no" type="radio" name="t_posyandu" value="0" @if(old('t_posyandu') == "0") checked @endif>
                                    <label class="form-check-label" for="t_posyandu_no">Tidak</label>
                                </div>
                                @error('t_posyandu')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_posbindu" class="ml-1"><strong>Posbindu :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_posbindu_yes" type="radio" name="t_posbindu" value="1" @if(old('t_posbindu') == "1") checked @endif>
                                    <label class="form-check-label" for="t_posbindu_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_posbindu_no" type="radio" name="t_posbindu" value="0" @if(old('t_posbindu') == "0") checked @endif>
                                    <label class="form-check-label" for="t_posbindu_no">Tidak</label>
                                </div>
                                @error('t_posbindu')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="t_praktik_dukun_bayi_bersalin" class="ml-1"><strong>Praktik Dukun Bayi Bersalin :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_praktik_dukun_bayi_bersalin_yes" type="radio" name="t_praktik_dukun_bayi_bersalin" value="1" @if(old('t_praktik_dukun_bayi_bersalin') == "1") checked @endif>
                                    <label class="form-check-label" for="t_praktik_dukun_bayi_bersalin_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="t_praktik_dukun_bayi_bersalin_no" type="radio" name="t_praktik_dukun_bayi_bersalin" value="0" @if(old('t_praktik_dukun_bayi_bersalin') == "0") checked @endif>
                                    <label class="form-check-label" for="t_praktik_dukun_bayi_bersalin_no">Tidak</label>
                                </div>
                                @error('t_praktik_dukun_bayi_bersalin')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="asi_ibu_ekslusif" class="ml-1"><strong>Apakah Anak Anda Menerima ASI Eksklusif :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="asi_ibu_ekslusif_yes" type="radio" name="asi_ibu_ekslusif" value="1" @if(old('asi_ibu_ekslusif') == "1") checked @endif>
                                    <label class="form-check-label" for="asi_ibu_ekslusif_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="asi_ibu_ekslusif_no" type="radio" name="asi_ibu_ekslusif" value="0" @if(old('asi_ibu_ekslusif') == "0") checked @endif>
                                    <label class="form-check-label" for="asi_ibu_ekslusif_no">Tidak</label>
                                </div>
                                @error('asi_ibu_ekslusif')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jaminan_asuransi_kesehatan" class="ml-1"><strong>Apakah saudara/sdri mempunyai jaminan asuransi kesehatan ? :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jaminan_asuransi_kesehatan_mandiri" type="radio" name="jaminan_asuransi_kesehatan" value="1" @if(old('jaminan_asuransi_kesehatan') == "1") checked @endif>
                                    <label class="form-check-label" for="jaminan_asuransi_kesehatan_mandiri">Asuransi kesehatan secara mandiri (Prudential, Manulife, dsb)</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jaminan_asuransi_kesehatan_kis" type="radio" name="jaminan_asuransi_kesehatan" value="2" @if(old('jaminan_asuransi_kesehatan') == "0") checked @endif>
                                    <label class="form-check-label" for="jaminan_asuransi_kesehatan_kis">Kartu Indonesia Sehat</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jaminan_asuransi_kesehatan_bpjs_sehat" type="radio" name="jaminan_asuransi_kesehatan" value="3" @if(old('jaminan_asuransi_kesehatan') == "0") checked @endif>
                                    <label class="form-check-label" for="jaminan_asuransi_kesehatan_bpjs_sehat">Kartu BPJS Kesehatan</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jaminan_asuransi_kesehatan_bpjs_kerja" type="radio" name="jaminan_asuransi_kesehatan" value="4" @if(old('jaminan_asuransi_kesehatan') == "0") checked @endif>
                                    <label class="form-check-label" for="jaminan_asuransi_kesehatan_bpjs_kerja">Kartu BPJS Ketenagakerjaan</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jaminan_asuransi_kesehatan_belum" type="radio" name="jaminan_asuransi_kesehatan" value="5" @if(old('jaminan_asuransi_kesehatan') == "0") checked @endif>
                                    <label class="form-check-label" for="jaminan_asuransi_kesehatan_belum">Belum punya</label>
                                </div>
                                @error('jaminan_asuransi_kesehatan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bpjs" class="ml-1"><strong>Nomor Jaminan Asuransi Kesehatan (Kosongi bila tidak ada) :</strong></label>
                                <input type="text" class="form-control  @error('bpjs') is-invalid @enderror" name="bpjs" placeholder=""value="{{old('bpjs')}}">
                                @error('bpjs')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="konsumsi_obat" class="ml-1"><strong>Obat yang dikonsumsi :</strong></label>
                                <input type="text" class="form-control  @error('konsumsi_obat') is-invalid @enderror" name="konsumsi_obat" placeholder="Obat yang dikonsumsi..."value="{{old('konsumsi_obat')}}">
                                @error('konsumsi_obat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="konsumsi_jamu" class="ml-1"><strong>Jamu yang dikonsumsi :</strong></label>
                                <input type="text" class="form-control  @error('konsumsi_jamu') is-invalid @enderror" name="konsumsi_jamu" placeholder="Jamu yang dikonsumsi..."value="{{old('konsumsi_jamu')}}">
                                @error('konsumsi_jamu')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Riwayat Aktivitas Fisik dan Psikis - Yang Pernah Dialami Selama 4 Bulan Terakhir</h6>
                </div>          
                <div class="card-body">
                    <p><strong>Riwayat Aktivitas Fisik</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="f_berjalan" class="ml-1"><strong>Apakah Anda Sering Berjalan Kaki :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_berjalan_yes" type="radio" name="f_berjalan" value="1" @if(old('f_berjalan') == "1") checked @endif>
                                    <label class="form-check-label" for="f_berjalan_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_berjalan_no" type="radio" name="f_berjalan" value="0" @if(old('f_berjalan') == "0") checked @endif>
                                    <label class="form-check-label" for="f_berjalan_no">Tidak</label>
                                </div>
                                @error('f_berjalan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="f_olahraga" class="ml-1"><strong>Apakah Anda Sering Berolahraga :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_olahraga_yes" type="radio" name="f_olahraga" value="1" @if(old('f_olahraga') == "1") checked @endif>
                                    <label class="form-check-label" for="f_olahraga_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_olahraga_no" type="radio" name="f_olahraga" value="0" @if(old('f_olahraga') == "0") checked @endif>
                                    <label class="form-check-label" for="f_olahraga_no">Tidak</label>
                                </div>
                                @error('f_olahraga')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="f_sepeda" class="ml-1"><strong>Apakah Anda Sering Bersepeda :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_sepeda_yes" type="radio" name="f_sepeda" value="1" @if(old('f_sepeda') == "1") checked @endif>
                                    <label class="form-check-label" for="f_sepeda_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_sepeda_no" type="radio" name="f_sepeda" value="0" @if(old('f_sepeda') == "0") checked @endif>
                                    <label class="form-check-label" for="f_sepeda_no">Tidak</label>
                                </div>
                                @error('f_sepeda')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="f_berpergian" class="ml-1"><strong>Apakah Anda Sering Berpergian :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_berpergian_yes" type="radio" name="f_berpergian" value="1" @if(old('f_berpergian') == "1") checked @endif>
                                    <label class="form-check-label" for="f_berpergian_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_berpergian_no" type="radio" name="f_berpergian" value="0" @if(old('f_berpergian') == "0") checked @endif>
                                    <label class="form-check-label" for="f_berpergian_no">Tidak</label>
                                </div>
                                @error('f_berpergian')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="f_beban_ringan" class="ml-1"><strong>Apakah Anda Sering Mengangkat Beban Ringan (<20 kg) :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_beban_ringan_yes" type="radio" name="f_beban_ringan" value="1" @if(old('f_beban_ringan') == "1") checked @endif>
                                    <label class="form-check-label" for="f_beban_ringan_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_beban_ringan_no" type="radio" name="f_beban_ringan" value="0" @if(old('f_beban_ringan') == "0") checked @endif>
                                    <label class="form-check-label" for="f_beban_ringan_no">Tidak</label>
                                </div>
                                @error('f_beban_ringan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="f_beban_berat" class="ml-1"><strong>Apakah Anda Sering Mengangkat Beban Berat (>20 kg) :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_beban_berat_yes" type="radio" name="f_beban_berat" value="1" @if(old('f_beban_berat') == "1") checked @endif>
                                    <label class="form-check-label" for="f_beban_berat_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="f_beban_berat_no" type="radio" name="f_beban_berat" value="0" @if(old('f_beban_berat') == "0") checked @endif>
                                    <label class="form-check-label" for="f_beban_berat_no">Tidak</label>
                                </div>
                                @error('f_beban_berat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <p><strong>Riwayat Aktivitas Psikis</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_marah" class="ml-1"><strong>Apakah Anda Sering Marah :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_marah_yes" type="radio" name="p_marah" value="1" @if(old('p_marah') == "1") checked @endif>
                                    <label class="form-check-label" for="p_marah_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_marah_no" type="radio" name="p_marah" value="0" @if(old('p_marah') == "0") checked @endif>
                                    <label class="form-check-label" for="p_marah_no">Tidak</label>
                                </div>
                                @error('p_marah')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_kesal" class="ml-1"><strong>Apakah Anda Sering Kesal :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_kesal_yes" type="radio" name="p_kesal" value="1" @if(old('p_kesal') == "1") checked @endif>
                                    <label class="form-check-label" for="p_kesal_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_kesal_no" type="radio" name="p_kesal" value="0" @if(old('p_kesal') == "0") checked @endif>
                                    <label class="form-check-label" for="p_kesal_no">Tidak</label>
                                </div>
                                @error('p_kesal')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_cemas" class="ml-1"><strong>Apakah Anda Sering Cemas :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_cemas_yes" type="radio" name="p_cemas" value="1" @if(old('p_cemas') == "1") checked @endif>
                                    <label class="form-check-label" for="p_cemas_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_cemas_no" type="radio" name="p_cemas" value="0" @if(old('p_cemas') == "0") checked @endif>
                                    <label class="form-check-label" for="p_cemas_no">Tidak</label>
                                </div>
                                @error('p_cemas')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_tersinggung" class="ml-1"><strong>Apakah Anda Sering Tersinggung :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_tersinggung_yes" type="radio" name="p_tersinggung" value="1" @if(old('p_tersinggung') == "1") checked @endif>
                                    <label class="form-check-label" for="p_tersinggung_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_tersinggung_no" type="radio" name="p_tersinggung" value="0" @if(old('p_tersinggung') == "0") checked @endif>
                                    <label class="form-check-label" for="p_tersinggung_no">Tidak</label>
                                </div>
                                @error('p_tersinggung')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_sulit_tidur_istirahat" class="ml-1"><strong>Apakah Anda Sulit Tidur / Istirahat :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_sulit_tidur_istirahat_yes" type="radio" name="p_sulit_tidur_istirahat" value="1" @if(old('p_sulit_tidur_istirahat') == "1") checked @endif>
                                    <label class="form-check-label" for="p_sulit_tidur_istirahat_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_sulit_tidur_istirahat_no" type="radio" name="p_sulit_tidur_istirahat" value="0" @if(old('p_sulit_tidur_istirahat') == "0") checked @endif>
                                    <label class="form-check-label" for="p_sulit_tidur_istirahat_no">Tidak</label>
                                </div>
                                @error('p_sulit_tidur_istirahat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_gelisah" class="ml-1"><strong>Apakah Anda Sering Gelisah :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_gelisah_yes" type="radio" name="p_gelisah" value="1" @if(old('p_gelisah') == "1") checked @endif>
                                    <label class="form-check-label" for="p_gelisah_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_gelisah_no" type="radio" name="p_gelisah" value="0" @if(old('p_gelisah') == "0") checked @endif>
                                    <label class="form-check-label" for="p_gelisah_no">Tidak</label>
                                </div>
                                @error('p_gelisah')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_mengantuk" class="ml-1"><strong>Apakah Anda Sering Mengantuk :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_mengantuk_yes" type="radio" name="p_mengantuk" value="1" @if(old('p_mengantuk') == "1") checked @endif>
                                    <label class="form-check-label" for="p_mengantuk_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_mengantuk_no" type="radio" name="p_mengantuk" value="0" @if(old('p_mengantuk') == "0") checked @endif>
                                    <label class="form-check-label" for="p_mengantuk_no">Tidak</label>
                                </div>
                                @error('p_mengantuk')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_tidak_sabar" class="ml-1"><strong>Apakah Anda Sering Tidak Sabar :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_tidak_sabar_yes" type="radio" name="p_tidak_sabar" value="1" @if(old('p_tidak_sabar') == "1") checked @endif>
                                    <label class="form-check-label" for="p_tidak_sabar_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_tidak_sabar_no" type="radio" name="p_tidak_sabar" value="0" @if(old('p_tidak_sabar') == "0") checked @endif>
                                    <label class="form-check-label" for="p_tidak_sabar_no">Tidak</label>
                                </div>
                                @error('p_tidak_sabar')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="p_bahagia" class="ml-1"><strong>Apakah Anda Sering Bahagia :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_bahagia_yes" type="radio" name="p_bahagia" value="1" @if(old('p_bahagia') == "1") checked @endif>
                                    <label class="form-check-label" for="p_bahagia_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="p_bahagia_no" type="radio" name="p_bahagia" value="0" @if(old('p_bahagia') == "0") checked @endif>
                                    <label class="form-check-label" for="p_bahagia_no">Tidak</label>
                                </div>
                                @error('p_bahagia')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="k_lama_waktu_tidur" class="ml-1"><strong>Lama Waktu Tidur :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="k_lama_waktu_tidur_low" type="radio" name="k_lama_waktu_tidur" value="1" @if(old('k_lama_waktu_tidur') == "1") checked @endif>
                                    <label class="form-check-label" for="k_lama_waktu_tidur_low">Kurang dari 6 jam / hari</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="k_lama_waktu_tidur_mid" type="radio" name="k_lama_waktu_tidur" value="2" @if(old('k_lama_waktu_tidur') == "2") checked @endif>
                                    <label class="form-check-label" for="k_lama_waktu_tidur_mid">6 - 8 jam / hari</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="k_lama_waktu_tidur_high" type="radio" name="k_lama_waktu_tidur" value="3" @if(old('k_lama_waktu_tidur') == "3") checked @endif>
                                    <label class="form-check-label" for="k_lama_waktu_tidur_high">Lebih dari 8 jam / hari</label>
                                </div>
                                @error('k_lama_waktu_tidur')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Riwayat Perilaku Hidup Bersih dan Sehat (PHBS)</h6>
                </div>          
                <div class="card-body">
                    <p><strong>PHBS - Air Bersih</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ab_memasak_air" class="ml-1"><strong>Memasak air hingga mendidih sebelum dikonsumsi :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="ab_memasak_air_yes" type="radio" name="ab_memasak_air" value="1" @if(old('ab_memasak_air') == "1") checked @endif>
                                    <label class="form-check-label" for="ab_memasak_air_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="ab_memasak_air_no" type="radio" name="ab_memasak_air" value="0" @if(old('ab_memasak_air') == "0") checked @endif>
                                    <label class="form-check-label" for="ab_memasak_air_no">Tidak</label>
                                </div>
                                @error('ab_memasak_air')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ab_air_sehat" class="ml-1"><strong>Air yang digunakan untuk sehari-hari tidak berwarna, tidak keruh, tidak berasa dan tidak berbau :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="ab_air_sehat_yes" type="radio" name="ab_air_sehat" value="1" @if(old('ab_air_sehat') == "1") checked @endif>
                                    <label class="form-check-label" for="ab_air_sehat_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="ab_air_sehat_no" type="radio" name="ab_air_sehat" value="0" @if(old('ab_air_sehat') == "0") checked @endif>
                                    <label class="form-check-label" for="ab_air_sehat_no">Tidak</label>
                                </div>
                                @error('ab_air_sehat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ab_sumber_air" class="ml-1"><strong>Air yang digunakan diperoleh dari mata air, sumur gali, air kemasan, sumur pompa, atau PDAM :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="ab_sumber_air_yes" type="radio" name="ab_sumber_air" value="1" @if(old('ab_sumber_air') == "1") checked @endif>
                                    <label class="form-check-label" for="ab_sumber_air_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="ab_sumber_air_no" type="radio" name="ab_sumber_air" value="0" @if(old('ab_sumber_air') == "0") checked @endif>
                                    <label class="form-check-label" for="ab_sumber_air_no">Tidak</label>
                                </div>
                                @error('ab_sumber_air')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <p><strong>PHBS - Air Mencuci Tangan</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mt_sebelum_sesudah_makan" class="ml-1"><strong>Mencuci tangan sebelum dan sesudah makan :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="mt_sebelum_sesudah_makan_yes" type="radio" name="mt_sebelum_sesudah_makan" value="1" @if(old('mt_sebelum_sesudah_makan') == "1") checked @endif>
                                    <label class="form-check-label" for="mt_sebelum_sesudah_makan_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="mt_sebelum_sesudah_makan_no" type="radio" name="mt_sebelum_sesudah_makan" value="0" @if(old('mt_sebelum_sesudah_makan') == "0") checked @endif>
                                    <label class="form-check-label" for="mt_sebelum_sesudah_makan_no">Tidak</label>
                                </div>
                                @error('mt_sebelum_sesudah_makan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mt_menggunakan_air_sabun" class="ml-1"><strong>Mencuci tangan menggunakan air mangalir dan memakai sabun :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="mt_menggunakan_air_sabun_yes" type="radio" name="mt_menggunakan_air_sabun" value="1" @if(old('mt_menggunakan_air_sabun') == "1") checked @endif>
                                    <label class="form-check-label" for="mt_menggunakan_air_sabun_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="mt_menggunakan_air_sabun_no" type="radio" name="mt_menggunakan_air_sabun" value="0" @if(old('mt_menggunakan_air_sabun') == "0") checked @endif>
                                    <label class="form-check-label" for="mt_menggunakan_air_sabun_no">Tidak</label>
                                </div>
                                @error('mt_menggunakan_air_sabun')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <p><strong>PHBS - Jamban Sehat</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="js_bab_bak" class="ml-1"><strong>Menggunakan jamban sebagai tempat bab/bak :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="js_bab_bak_yes" type="radio" name="js_bab_bak" value="1" @if(old('js_bab_bak') == "1") checked @endif>
                                    <label class="form-check-label" for="js_bab_bak_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="js_bab_bak_no" type="radio" name="js_bab_bak" value="0" @if(old('js_bab_bak') == "0") checked @endif>
                                    <label class="form-check-label" for="js_bab_bak_no">Tidak</label>
                                </div>
                                @error('js_bab_bak')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="js_mudah_dibersihkan" class="ml-1"><strong>Jamban yang digunakan mudah dibersihkan, aman digunakan :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="js_mudah_dibersihkan_yes" type="radio" name="js_mudah_dibersihkan" value="1" @if(old('js_mudah_dibersihkan') == "1") checked @endif>
                                    <label class="form-check-label" for="js_mudah_dibersihkan_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="js_mudah_dibersihkan_no" type="radio" name="js_mudah_dibersihkan" value="0" @if(old('js_mudah_dibersihkan') == "0") checked @endif>
                                    <label class="form-check-label" for="js_mudah_dibersihkan_no">Tidak</label>
                                </div>
                                @error('js_mudah_dibersihkan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="js_membersihkan_setiap_hari" class="ml-1"><strong>Membersihkan toilet/jamban setiap hari :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="js_membersihkan_setiap_hari_yes" type="radio" name="js_membersihkan_setiap_hari" value="1" @if(old('js_membersihkan_setiap_hari') == "1") checked @endif>
                                    <label class="form-check-label" for="js_membersihkan_setiap_hari_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="js_membersihkan_setiap_hari_no" type="radio" name="js_membersihkan_setiap_hari" value="0" @if(old('js_membersihkan_setiap_hari') == "0") checked @endif>
                                    <label class="form-check-label" for="js_membersihkan_setiap_hari_no">Tidak</label>
                                </div>
                                @error('js_membersihkan_setiap_hari')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <p><strong>PHBS - Jentik Nyamuk</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jn_menguras" class="ml-1"><strong>Memberantas jentik nyamuk dengan menguras dan menyikat tempat-tempat penampungan air :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jn_menguras_yes" type="radio" name="jn_menguras" value="1" @if(old('jn_menguras') == "1") checked @endif>
                                    <label class="form-check-label" for="jn_menguras_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jn_menguras_no" type="radio" name="jn_menguras" value="0" @if(old('jn_menguras') == "0") checked @endif>
                                    <label class="form-check-label" for="jn_menguras_no">Tidak</label>
                                </div>
                                @error('jn_menguras')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jn_menutup" class="ml-1"><strong>Memberantas jentik dengan menutup rapat-rapat tempat penampungan air :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jn_menutup_yes" type="radio" name="jn_menutup" value="1" @if(old('jn_menutup') == "1") checked @endif>
                                    <label class="form-check-label" for="jn_menutup_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jn_menutup_no" type="radio" name="jn_menutup" value="0" @if(old('jn_menutup') == "0") checked @endif>
                                    <label class="form-check-label" for="jn_menutup_no">Tidak</label>
                                </div>
                                @error('jn_menutup')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jn_mengubur" class="ml-1"><strong>Memberantas jentik dengan mengubur atau menyingkirkan barang-barang bekas yang dapat menampung air :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jn_mengubur_yes" type="radio" name="jn_mengubur" value="1" @if(old('jn_mengubur') == "1") checked @endif>
                                    <label class="form-check-label" for="jn_mengubur_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="jn_mengubur_no" type="radio" name="jn_mengubur" value="0" @if(old('jn_mengubur') == "0") checked @endif>
                                    <label class="form-check-label" for="jn_mengubur_no">Tidak</label>
                                </div>
                                @error('jn_mengubur')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <p><strong>PHBS - Buah Sayur</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bs_mengkonsumsi" class="ml-1"><strong>Mengkonsumsi buah dan sayuran setiap hari :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="bs_mengkonsumsi_yes" type="radio" name="bs_mengkonsumsi" value="1" @if(old('bs_mengkonsumsi') == "1") checked @endif>
                                    <label class="form-check-label" for="bs_mengkonsumsi_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="bs_mengkonsumsi_no" type="radio" name="bs_mengkonsumsi" value="0" @if(old('bs_mengkonsumsi') == "0") checked @endif>
                                    <label class="form-check-label" for="bs_mengkonsumsi_no">Tidak</label>
                                </div>
                                @error('bs_mengkonsumsi')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bs_segar_sehat" class="ml-1"><strong>Memilih buah dan sayur yang segar, bebas dari pestisida, dan zat berbahaya :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="bs_segar_sehat_yes" type="radio" name="bs_segar_sehat" value="1" @if(old('bs_segar_sehat') == "1") checked @endif>
                                    <label class="form-check-label" for="bs_segar_sehat_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="bs_segar_sehat_no" type="radio" name="bs_segar_sehat" value="0" @if(old('bs_segar_sehat') == "0") checked @endif>
                                    <label class="form-check-label" for="bs_segar_sehat_no">Tidak</label>
                                </div>
                                @error('bs_segar_sehat')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <p><strong>PHBS - Aktivitas Fisik</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="af_olahraga" class="ml-1"><strong>Melakukan aktifitas fisik atau olahraga :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="af_olahraga_yes" type="radio" name="af_olahraga" value="1" @if(old('af_olahraga') == "1") checked @endif>
                                    <label class="form-check-label" for="af_olahraga_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="af_olahraga_no" type="radio" name="af_olahraga" value="0" @if(old('af_olahraga') == "0") checked @endif>
                                    <label class="form-check-label" for="af_olahraga_no">Tidak</label>
                                </div>
                                @error('af_olahraga')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <p><strong>PHBS - Tidak Merokok Dalam Rumah</strong></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="r_dalam_rumah" class="ml-1"><strong>Merokok di dalam rumah :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="r_dalam_rumah_yes" type="radio" name="r_dalam_rumah" value="1" @if(old('r_dalam_rumah') == "1") checked @endif>
                                    <label class="form-check-label" for="r_dalam_rumah_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="r_dalam_rumah_no" type="radio" name="r_dalam_rumah" value="0" @if(old('r_dalam_rumah') == "0") checked @endif>
                                    <label class="form-check-label" for="r_dalam_rumah_no">Tidak</label>
                                </div>
                                @error('r_dalam_rumah')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="r_asbak_rokok" class="ml-1"><strong>Terdapat asbak rokok di dalam rumah :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="r_asbak_rokok_yes" type="radio" name="r_asbak_rokok" value="1" @if(old('r_asbak_rokok') == "1") checked @endif>
                                    <label class="form-check-label" for="r_asbak_rokok_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="r_asbak_rokok_no" type="radio" name="r_asbak_rokok" value="0" @if(old('r_asbak_rokok') == "0") checked @endif>
                                    <label class="form-check-label" for="r_asbak_rokok_no">Tidak</label>
                                </div>
                                @error('r_asbak_rokok')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="r_tanpa_rokok" class="ml-1"><strong>Sepakat secara bersama sama untuk menciptakan rumah tanpa asap rokok :</strong></label><br>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="r_tanpa_rokok_yes" type="radio" name="r_tanpa_rokok" value="1" @if(old('r_tanpa_rokok') == "1") checked @endif>
                                    <label class="form-check-label" for="r_tanpa_rokok_yes">Ya</label>
                                </div>
                                <div class="form-check form-check-inline ml-1">
                                    <input class="form-check-input" id="r_tanpa_rokok_no" type="radio" name="r_tanpa_rokok" value="0" @if(old('r_tanpa_rokok') == "0") checked @endif>
                                    <label class="form-check-label" for="r_tanpa_rokok_no">Tidak</label>
                                </div>
                                @error('r_tanpa_rokok')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <button class="btn btn-primary btn-icon-split mt-2 w-100" type="submit">
                    <span class="text">Simpan Pendataan</span>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection