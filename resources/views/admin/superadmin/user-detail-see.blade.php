@extends('admin.core.core-dashboard')
@section('onPage', 'Lihat Detail User')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="w-25">User Utama</th>
                                <td>{{$getUserDetail->name}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Nama Lengkap</th>
                                <td>{{$getUserDetail->nama_lengkap}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Tempat Lahir</th>
                                <td>{{$getUserDetail->tempat_lahir}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Tanggal Lahir</th>
                                <td>{{$getUserDetail->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Jenis Kelamin</th>
                                <td>{{$getUserDetail->jenis_kelamin}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Alamat, RT, RW, Dusun</th>
                                <td>{{$getUserDetail->alamat}}, RT {{$getUserDetail->rt}}, RW {{$getUserDetail->rw}}, Dusun {{$getUserDetail->nama_dusun}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">NIK</th>
                                <td>{{$getUserDetail->nik}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Status Hubungan</th>
                                <td>{{$getUserDetail->nama_hubungan}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Pekerjaan</th>
                                <td>{{$getUserDetail->nama_pekerjaan}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Penyakit - 4 Bulan Terakhir</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="w-25">Penyakit Ispa</th>
                                <td>
                                    @if ($getUserPenyakit->p_ispa == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_ispa == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Muntaber</th>
                                <td>
                                    @if ($getUserPenyakit->p_muntaber == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_muntaber == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Demam Berdarah</th>
                                <td>
                                    @if ($getUserPenyakit->p_demam_berdarah == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_demam_berdarah == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Campak</th>
                                <td>
                                    @if ($getUserPenyakit->p_campak == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_campak == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Malaria</th>
                                <td>
                                    @if ($getUserPenyakit->p_malaria == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_malaria == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Flu Burung</th>
                                <td>
                                    @if ($getUserPenyakit->p_flu_burung == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_flu_burung == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Covid-19</th>
                                <td>
                                    @if ($getUserPenyakit->p_covid19 == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_covid19 == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Hepatitis B</th>
                                <td>
                                    @if ($getUserPenyakit->p_hepatitis_b == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_hepatitis_b == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Leptopspirosis</th>
                                <td>
                                    @if ($getUserPenyakit->p_leptopspirosis == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_leptopspirosis == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Kolera</th>
                                <td>
                                    @if ($getUserPenyakit->p_kolera == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_kolera == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Gizi Buruk</th>
                                <td>
                                    @if ($getUserPenyakit->p_gizi_buruk == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_gizi_buruk == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Jantung</th>
                                <td>
                                    @if ($getUserPenyakit->p_jantung == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_jantung == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Tbc Paru</th>
                                <td>
                                    @if ($getUserPenyakit->p_tbc_paru == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_tbc_paru == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Kanker</th>
                                <td>
                                    @if ($getUserPenyakit->p_kanker == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_kanker == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Diabetes</th>
                                <td>
                                    @if ($getUserPenyakit->p_diabetes == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_diabetes == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Hepatitis E</th>
                                <td>
                                    @if ($getUserPenyakit->p_hepatitis_e == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_hepatitis_e == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Difteri</th>
                                <td>
                                    @if ($getUserPenyakit->p_difteri == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_difteri == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Chikungunya</th>
                                <td>
                                    @if ($getUserPenyakit->p_chikungunya == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_chikungunya == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Lumpuh</th>
                                <td>
                                    @if ($getUserPenyakit->p_lumpuh == 1)
                                        Iya
                                    @elseif ($getUserPenyakit->p_lumpuh == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Penyakit Lainnya</th>
                                <td>
                                    @if ($getUserPenyakit->p_lainnya == 1)
                                        Iya - {{$getUserPenyakit->keterangan_p_lainnya}}
                                    @elseif ($getUserPenyakit->p_lainnya == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Fasilitas Kesehatan - 4 Bulan Terakhir</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="w-25">Rumah Sakit</th>
                                <td>
                                    @if ($getUserFasilitas->t_rumah_sakit == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_rumah_sakit == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Rumah Sakit Bersalin</th>
                                <td>
                                    @if ($getUserFasilitas->t_rumah_sakit_bersalin == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_rumah_sakit_bersalin == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Puskesmas Rawat Inap</th>
                                <td>
                                    @if ($getUserFasilitas->t_puskesmas_rawat_inap == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_puskesmas_rawat_inap == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Puskesmas Rawat Tanpa Inap</th>
                                <td>
                                    @if ($getUserFasilitas->t_puskesmas_rawat_tanpa_inap == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_puskesmas_rawat_tanpa_inap == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Puskesmas Pembantu</th>
                                <td>
                                    @if ($getUserFasilitas->t_puskesmas_pembantu == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_puskesmas_pembantu == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Poliklinik</th>
                                <td>
                                    @if ($getUserFasilitas->t_poliklinik == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_poliklinik == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Praktik Dokter</th>
                                <td>
                                    @if ($getUserFasilitas->t_praktik_dokter == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_praktik_dokter == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Rumah Bersalin</th>
                                <td>
                                    @if ($getUserFasilitas->t_rumah_bersalin == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_rumah_bersalin == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Praktik Bidan</th>
                                <td>
                                    @if ($getUserFasilitas->t_praktik_bidan == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_praktik_bidan == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Poskesdes</th>
                                <td>
                                    @if ($getUserFasilitas->t_poskesdes == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_poskesdes == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Polindes</th>
                                <td>
                                    @if ($getUserFasilitas->t_polindes == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_polindes == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Apotik</th>
                                <td>
                                    @if ($getUserFasilitas->t_apotik == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_apotik == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Tempat Khusus Obat / Jamu</th>
                                <td>
                                    @if ($getUserFasilitas->t_khusus_obat_jamu == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_khusus_obat_jamu == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Posyandu</th>
                                <td>
                                    @if ($getUserFasilitas->t_posyandu == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_posyandu == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Posbindu</th>
                                <td>
                                    @if ($getUserFasilitas->t_posbindu == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_posbindu == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Praktik Dukun Bayi / Bersalin</th>
                                <td>
                                    @if ($getUserFasilitas->t_praktik_dukun_bayi_bersalin == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->t_praktik_dukun_bayi_bersalin == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Apakah bayi anda menerima asi ekslusif ?</th>
                                <td>
                                    @if ($getUserFasilitas->asi_ibu_ekslusif == 1)
                                        Iya
                                    @elseif ($getUserFasilitas->asi_ibu_ekslusif == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Obat yang dikonsumsi</th>
                                <td>{{$getUserFasilitas->konsumsi_obat}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Jamu yang dikonsumsi</th>
                                <td>{{$getUserFasilitas->konsumsi_jamu}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">BPJS</th>
                                <td>{{$getUserFasilitas->bpjs}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Aktivitas Fisik & Psikis - 4 Bulan Terakhir</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="w-25">Sering Berjalan</th>
                                <td>
                                    @if ($getUserFisik->f_berjalan == 1)
                                        Iya
                                    @elseif ($getUserFisik->f_berjalan == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Olahraga</th>
                                <td>
                                    @if ($getUserFisik->f_olahraga == 1)
                                        Iya
                                    @elseif ($getUserFisik->f_olahraga == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Bersepeda</th>
                                <td>
                                    @if ($getUserFisik->f_sepeda == 1)
                                        Iya
                                    @elseif ($getUserFisik->f_sepeda == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Berpergian</th>
                                <td>
                                    @if ($getUserFisik->f_berpergian == 1)
                                        Iya
                                    @elseif ($getUserFisik->f_berpergian == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Angkat Beban Ringan (<20 kg)</th>
                                <td>
                                    @if ($getUserFisik->f_beban_ringan == 1)
                                        Iya
                                    @elseif ($getUserFisik->f_beban_ringan == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Angkat Beban Berat (>20 kg)</th>
                                <td>
                                    @if ($getUserFisik->f_beban_berat == 1)
                                        Iya
                                    @elseif ($getUserFisik->f_beban_berat == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Marah</th>
                                <td>
                                    @if ($getUserPsikis->p_marah == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_marah == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Kesal</th>
                                <td>
                                    @if ($getUserPsikis->p_kesal == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_kesal == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Cemas</th>
                                <td>
                                    @if ($getUserPsikis->p_cemas == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_cemas == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Tersinggung</th>
                                <td>
                                    @if ($getUserPsikis->p_tersinggung == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_tersinggung == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sulit Untuk Tidur / Istirahat</th>
                                <td>
                                    @if ($getUserPsikis->p_sulit_tidur_istirahat == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_sulit_tidur_istirahat == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Gelisah</th>
                                <td>
                                    @if ($getUserPsikis->p_gelisah == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_gelisah == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Mengantuk</th>
                                <td>
                                    @if ($getUserPsikis->p_mengantuk == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_mengantuk == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Tidak Sabar</th>
                                <td>
                                    @if ($getUserPsikis->p_tidak_sabar == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_tidak_sabar == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Sering Bahagia</th>
                                <td>
                                    @if ($getUserPsikis->p_bahagia == 1)
                                        Iya
                                    @elseif ($getUserPsikis->p_bahagia == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-25">Lama Waktu Tidur</th>
                                <td>
                                    @if ($getUserTidur->k_lama_waktu_tidur == 1)
                                        Kurang dari 6 jam / hari
                                    @elseif ($getUserTidur->k_lama_waktu_tidur == 2)
                                        6 - 8 jam / hari
                                    @elseif ($getUserTidur->k_lama_waktu_tidur == 3)
                                        Lebih dari 8 jam / hari
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Perilaku Hidup Bersih dan Sehat (PHBS) - 4 Bulan Terakhir</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="w-50">Memasak air hingga mendidih sebelum dikonsumsi</th>
                                <td>
                                    @if ($getPhbsAirBersih->ab_memasak_air == 1)
                                        Iya
                                    @elseif ($getPhbsAirBersih->ab_memasak_air == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Air yang digunakan untuk sehari-hari tidak berwarna, tidak keruh, tidak berasa dan tidak berbau</th>
                                <td>
                                    @if ($getPhbsAirBersih->ab_air_sehat == 1)
                                        Iya
                                    @elseif ($getPhbsAirBersih->ab_air_sehat == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Air yang digunakan diperoleh dari mata air, sumur gali, penampungan air hujan, air kemasan, sumur pompa, atau PDAM</th>
                                <td>
                                    @if ($getPhbsAirBersih->ab_sumber_air == 1)
                                        Iya
                                    @elseif ($getPhbsAirBersih->ab_sumber_air == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Mencuci tangan sebelum dan sesudah makan</th>
                                <td>
                                    @if ($getPhbsMencuciTangan->mt_sebelum_sesudah_makan == 1)
                                        Iya
                                    @elseif ($getPhbsMencuciTangan->mt_sebelum_sesudah_makan == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Mencuci tangan menggunakan air mangalir dan memakai sabun</th>
                                <td>
                                    @if ($getPhbsMencuciTangan->mt_menggunakan_air_sabun == 1)
                                        Iya
                                    @elseif ($getPhbsMencuciTangan->mt_menggunakan_air_sabun == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Menggunakan jamban sebagai tempat bab/bak</th>
                                <td>
                                    @if ($getPhbsJambanSehat->js_bab_bak == 1)
                                        Iya
                                    @elseif ($getPhbsJambanSehat->js_bab_bak == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Jamban yang digunakan mudah dibersihkan, aman digunakan</th>
                                <td>
                                    @if ($getPhbsJambanSehat->js_mudah_dibersihkan == 1)
                                        Iya
                                    @elseif ($getPhbsJambanSehat->js_mudah_dibersihkan == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Membersihkan toilet/jamban setiap hari</th>
                                <td>
                                    @if ($getPhbsJambanSehat->js_membersihkan_setiap_hari == 1)
                                        Iya
                                    @elseif ($getPhbsJambanSehat->js_membersihkan_setiap_hari == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Memberantas jentik nyamuk dengan menguras dan menyikat tempat-tempat penampungan air</th>
                                <td>
                                    @if ($getPhbsJentikNyamuk->jn_menguras == 1)
                                        Iya
                                    @elseif ($getPhbsJentikNyamuk->jn_menguras == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Memberantas jentik dengan menutup rapat-rapat tempat penampungan air</th>
                                <td>
                                    @if ($getPhbsJentikNyamuk->jn_menutup == 1)
                                        Iya
                                    @elseif ($getPhbsJentikNyamuk->jn_menutup == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Memberantas jentik dengan mengubur atau menyingkirkan barang-barang bekas yang dapat menampung air</th>
                                <td>
                                    @if ($getPhbsJentikNyamuk->jn_mengubur == 1)
                                        Iya
                                    @elseif ($getPhbsJentikNyamuk->jn_mengubur == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Mengkonsumsi buah dan sayuran setiap hari</th>
                                <td>
                                    @if ($getPhbsBuahSayur->bs_mengkonsumsi == 1)
                                        Iya
                                    @elseif ($getPhbsBuahSayur->bs_mengkonsumsi == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Memilih buah dan sayur yang segar, bebas dari pestisida, dan zat berbahaya</th>
                                <td>
                                    @if ($getPhbsBuahSayur->bs_segar_sehat == 1)
                                        Iya
                                    @elseif ($getPhbsBuahSayur->bs_segar_sehat == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Melakukan aktifitas fisik atau olahraga</th>
                                <td>
                                    @if ($getPhbsAktivitasFisik->af_olahraga == 1)
                                        Iya
                                    @elseif ($getPhbsAktivitasFisik->af_olahraga == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Merokok di dalam rumah</th>
                                <td>
                                    @if ($getPhbsRokok->r_dalam_rumah == 1)
                                        Iya
                                    @elseif ($getPhbsRokok->r_dalam_rumah == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Terdapat asbak rokok di dalam rumah</th>
                                <td>
                                    @if ($getPhbsRokok->r_asbak_rokok == 1)
                                        Iya
                                    @elseif ($getPhbsRokok->r_asbak_rokok == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="w-50">Sepakat secara bersama sama untuk menciptakan rumah tanpa asap rokok</th>
                                <td>
                                    @if ($getPhbsRokok->r_tanpa_rokok == 1)
                                        Iya
                                    @elseif ($getPhbsRokok->r_tanpa_rokok == 0)
                                        Tidak
                                    @else
                                        [Tidak Diketahui]
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection