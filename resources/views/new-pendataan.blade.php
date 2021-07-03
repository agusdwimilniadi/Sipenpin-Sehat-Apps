@extends('layouts.app')
@section('title')
    Pendataan Kesehatan
@endsection

@section('content')
<style>
    * {
            margin: 0;
            padding: 0
        }


        html {
            height: 100%
        }

        #grad1 {
            background-color: : #9C27B0;
            background-image: linear-gradient(120deg, #FF4081, #81D4FA)
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: "Font Awesome 5 Free";
            content: "\f2bb";
        }

        #progressbar #personal:before {
            font-family: "Font Awesome 5 Free";
            content: "\f2bb";
        }

        #progressbar #payment:before {
            font-family: "Font Awesome 5 Free";
            content: "\f2bb";
        }

        #progressbar #confirm:before {
            font-family: "Font Awesome 5 Free";
            content: "\f2bb";
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
</style>

<!-- MultiStep Form -->
<div class="container-fluid">
    <div class="row justify-content-center mt-0">
        <div class="col-12 text-center p-0">
            <div class="card px-0 pt-4 pb-0 mb-3">
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST" action="{{url('/pendataan/save')}}">
                            @csrf
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Identitas</strong></li>
                                <li id="personal"><strong>Riwayat Penyakit</strong></li>
                                <li id="payment"><strong>Fasilitas Kesehatan</strong></li>
                                <li id="confirm"><strong>Riwayat Aktivitas</strong></li>
                            </ul> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center mb-3"> Data Identitas Diri</h2>
                                    <div class="form-group">
                                        <label for="nama_lengkap" class="ml-1"><strong>Nama Lengkap :</strong></label>
                                    <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder=""value="{{old('nama_lengkap')}}">
                                    @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                     @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat_lahir" class="ml-1"><strong>Tempat Lahir :</strong></label>
                                        <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder=""value="{{old('tempat_lahir')}}">
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_lahir" class="ml-1"><strong>Tanggal Lahir :</strong></label>
                                        <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" placeholder="Tempat Lahir..."value="{{old('tanggal_lahir')}}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
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
                                    <div class="form-group">
                                        <label for="alamat" class="ml-1"><strong>Alamat :</strong></label>
                                        <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat..."value="{{old('alamat')}}">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="rt" class="ml-1"><strong>RT :</strong></label>
                                        <input type="text" class="form-control  @error('rt') is-invalid @enderror" name="rt" placeholder="RT..."value="{{old('rt')}}">
                                        @error('rt')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="rw" class="ml-1"><strong>RW :</strong></label>
                                        <input type="text" class="form-control  @error('rw') is-invalid @enderror" name="rw" placeholder="RW..."value="{{old('rw')}}">
                                        @error('rw')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="dusun" class="ml-1"><strong>Nama Dusun</strong></label>
                                        <select class="custom-select" name="dusun">
                                            @foreach ($listDusun as $item)
                                            <option value="{{$item->id}}" @if(old('dusun') == $item->id) selected @endif>{{$item->nama_dusun}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nik" class="ml-1"><strong>NIK :</strong></label>
                                        <input type="number" class="form-control  @error('nik') is-invalid @enderror" name="nik" placeholder="NIK..."value="{{old('nik')}}">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status_hubungan" class="ml-1"><strong>Status Hubungan :</strong></label>
                                        <select class="custom-select" name="status_hubungan">
                                            @foreach ($listStatusHubungan as $item)
                                            <option value="{{$item->id}}" @if(old('status_hubungan') == $item->id) selected @endif>{{$item->nama_hubungan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan" class="ml-1"><strong>Pekerjaan :</strong></label>
                                        <select class="custom-select" name="pekerjaan">
                                            @foreach ($listPekerjaan as $item)
                                            <option value="{{$item->id}}" @if(old('pekerjaan') == $item->id) selected @endif>{{$item->nama_pekerjaan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Lanjut" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    
                                        <h2 class="fs-title text-center mb-3">Data Riwayat Penyakit</h2>
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
                                        <div class="form-group">
                                            <label for="p_lainnya" class="ml-1"><strong>Penyakit Lainnya yang belum disebutkan:</strong></label><br>
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
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                                <input type="button" name="next" class="next action-button" value="Lanjut" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center mb-3">Fasilitas Kesehatan</h2>
                                    <p class="text-center">Apakah anda mengunjungi tempat berikut untuk berobat dalam 4 bulan terakhir ?</p>
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
                                    <div class="form-group">
                                        <label for="bpjs" class="ml-1"><strong>Nomor Jaminan Asuransi Kesehatan (Kosongi bila tidak ada) :</strong></label>
                                        <input type="text" class="form-control  @error('bpjs') is-invalid @enderror" name="bpjs" placeholder=""value="{{old('bpjs')}}">
                                        @error('bpjs')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="konsumsi_obat" class="ml-1"><strong>Obat yang dikonsumsi :</strong></label>
                                        <input type="text" class="form-control  @error('konsumsi_obat') is-invalid @enderror" name="konsumsi_obat" placeholder=""value="{{old('konsumsi_obat')}}">
                                        @error('konsumsi_obat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="konsumsi_jamu" class="ml-1"><strong>Jamu yang dikonsumsi :</strong></label>
                                        <input type="text" class="form-control  @error('konsumsi_jamu') is-invalid @enderror" name="konsumsi_jamu" placeholder=""value="{{old('konsumsi_jamu')}}">
                                        @error('konsumsi_jamu')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bpjs" class="ml-1"><strong>BPJS (Kosongi bila tidak ada) :</strong></label>
                                        <input type="text" class="form-control  @error('bpjs') is-invalid @enderror" name="bpjs" placeholder=""value="{{old('bpjs')}}">
                                        @error('bpjs')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                                <input type="button" name="make_payment" class="next action-button" value="Lanjut" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center mb-3">Riwayat Aktivitas Fisik dan Psikis :</h2>
                                    <div class="form-group">
                                        <label for="f_berjalan" class="ml-1"><strong>Apakah Anda Sering Berjalan Kaki dalam 4 bulan terakhir :</strong></label><br>
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
                                    <div class="form-group">
                                        <label for="f_olahraga" class="ml-1">Apakah anda sering berkegiatan olahraga dalam 4 bulan terakhir ?</label><br>
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
                                    <div class="form-group">
                                        <label for="f_sepeda" class="ml-1">Apakah anda sering menganyuh sepeda dalam 4 bulan terakhir ?</label><br>
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
                                    <div class="form-group">
                                        <label for="f_berpergian" class="ml-1">Apakah anda sering berpergian keluar desa/kota dalam 4 bulan terakhir ?</label><br>
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
                                    <div class="form-group">
                                        <label for="f_beban_ringan" class="ml-1">Apakah anda sering mengangkat beban ringan (< 20 kg ) dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="f_beban_berat" class="ml-1">Apakah anda sering mengangkat beban ringan (>20 kg ) dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="k_lama_waktu_tidur" class="ml-1">Lama Waktu Tidur :</label><br>
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
                                    <div class="form-group">
                                        <label for="p_marah" class="ml-1">Apakah anda sering merasa mudah marah dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_kesal" class="ml-1">Apakah anda sering merasa kesal dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_cemas" class="ml-1">Apakah anda sering merasa cemas dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_tersinggung" class="ml-1">Apakah anda sering merasa mudah tersinggung dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_sulit_tidur_istirahat" class="ml-1">Apakah anda sering merasa sulit tidur/beristirahat dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_gelisah" class="ml-1">Apakah anda sering merasa gelisah dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_mengantuk" class="ml-1">Apakah anda sering merasa mudah mengantuk dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_tidak_sabar" class="ml-1">Apakah anda sering merasa tidak sabaran dalam 4 bulan terakhir?</label><br>
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
                                    <div class="form-group">
                                        <label for="p_bahagia" class="ml-1">Apakah anda sering merasa bahagia/senang dalam 4 bulan terakhir?</label><br>
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
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                                <input type="button" name="make_payment" class="next action-button" value="Lanjut" />
                                
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center mb-3">Perilaku Hidup Sehat dan Bersih :</h2>
                                    <div class="form-group">
                                        <label for="ab_memasak_air" class="ml-1">Apakah anda Memasak air hingga mendidih sebelum dikonsumsi </label><br>   
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
                                    <div class="form-group">
                                        <label for="ab_air_sehat" class="ml-1">Apakah Air yang digunakan untuk sehari-hari tidak berwarna, tidak keruh, tidak berasa dan tidak berbau? </label><br>   
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
                                    <div class="form-group">
                                        <label for="ab_sumber_air" class="ml-1">Apakah Air yang digunakan diperoleh dari mata air, sumur gali, air kemasan, sumur pompa, atau PDAM? </label><br>   
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
                                    <div class="form-group">
                                        <label for="mt_sebelum_sesudah_makan" class="ml-1">Apakah anda Mencuci tangan sebelum dan sesudah makan?</label><br>   
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
                                    <div class="form-group">
                                        <label for="mt_menggunakan_air_sabun" class="ml-1">Apakah anda mencuci tangan menggunakan air mangalir dan memakai sabun</label><br>   
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
                                    <div class="form-group">
                                        <label for="js_bab_bak" class="ml-1">Apakah anda Menggunakan jamban sebagai tempat BAB/BAK?</label><br>   
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
                                    <div class="form-group">
                                        <label for="js_mudah_dibersihkan" class="ml-1">Apakah jamban yang digunakan mudah dibersihkan, aman digunakan ?</label><br>   
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
                                    <div class="form-group">
                                        <label for="js_membersihkan_setiap_hari" class="ml-1">Apakah anda membersihkan toilet/jamban setiap hari. ?</label><br>   
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
                                    <div class="form-group">
                                        <label for="jn_menguras" class="ml-1">Apakah anda memberantas jentik nyamuk dengan menguras dan menyikat tempat-tempat penampungan air?</label><br>   
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
                                    <div class="form-group">
                                        <label for="jn_menutup" class="ml-1">Apakah anda memberantas jentik dengan menutup rapat-rapat tempat penampungan air.?</label><br>   
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
                                    <div class="form-group">
                                        <label for="jn_mengubur" class="ml-1">Apakah anda memberantas jentik dengan mengubur atau menyingkirkan barang-barang bekas yang dapat menampung air.?</label><br>   
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
                                    <div class="form-group">
                                        <label for="bs_mengkonsumsi" class="ml-1">Apakah anda Mengkonsumsi buah dan sayuran setiap hari.?</label><br>   
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
                                    <div class="form-group">
                                        <label for="bs_segar_sehat" class="ml-1">Apakah anda memilih buah dan sayur yang segar, bebas dari pestisida, dan zat berbahaya.?</label><br>   
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
                                    <div class="form-group">
                                        <label for="af_olahraga" class="ml-1">Apakah anda Melakukan aktifitas fisik atau olahraga.?</label><br>   
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
                                    <div class="form-group">
                                        <label for="r_dalam_rumah" class="ml-1">Apakah anda Merokok di dalam rumah.?</label><br>   
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
                                    <div class="form-group">
                                        <label for="r_asbak_rokok" class="ml-1">Apakah terdapat asbak rokok di dalam rumah?</label><br>   
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
                                    <div class="form-group">
                                        <label for="r_tanpa_rokok" class="ml-1">Apakah anda sepakat secara bersama sama untuk menciptakan rumah tanpa asap rokok?</label><br>   
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
                                <input type="button" name="previous" class="previous action-button-previous" value="Kembali" />
                                <input type="submit"  name="next" class="next action-button" value="Lanjut" class="" value="Simpan" />
                            </fieldset>
                            
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Selesai</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>Data Berhasil Dimasukkan</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script>
    $(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function(){

    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;

    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });

    $(".previous").click(function(){

    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;

    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 600
    });
    });

    $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    });

    $(".submit").click(function(){
    return false;
    })

    });
</script>
@endsection