<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use App\Models\MasterDusun;
use App\Models\MasterPekerjaan;
use App\Models\MasterStatusHubungan;
use App\Models\PhbsAirBersih;
use App\Models\PhbsAktivitasFisik;
use App\Models\PhbsBuahSayur;
use App\Models\PhbsJambanSehat;
use App\Models\PhbsJentikNyamuk;
use App\Models\PhbsMencuciTangan;
use App\Models\PhbsMerokok;
use App\Models\RiwayatAktivitasFisik;
use App\Models\RiwayatAktivitasPsikis;
use App\Models\RiwayatFasilitasKesehatan;
use App\Models\RiwayatKualitasTidur;
use App\Models\RiwayatPenyakit;

class PendataanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        /* return view('pendataan'); */
        $listUser = User::whereHas('roles', function($thisRole){
            $thisRole->where('name', 'User');
        })->get();
        $listDusun = MasterDusun::all();
        $listPekerjaan = MasterPekerjaan::all();
        $listStatusHubungan = MasterStatusHubungan::all();
        return view('new-pendataan', ['listUser' => $listUser, 'listDusun' => $listDusun, 'listPekerjaan' => $listPekerjaan, 'listStatusHubungan' => $listStatusHubungan])->with('onSide', 'userDetail');

    }
    public function save(Request $request)
    {
        $request->validate([
            /* identitas */
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'dusun' => 'required',
            'nik' => 'required|max:16|min:16',
            'pekerjaan' => 'required',
            'status_hubungan' => 'required',
            /* riwayat penyakit */
            'p_ispa' => 'required|in:0,1',
            'p_muntaber' => 'required |in:0,1',
            'p_demam_berdarah' => 'required |in:0,1',
            'p_campak' => 'required |in:0,1',
            'p_malaria' => 'required |in:0,1',
            'p_flu_burung' => 'required |in:0,1',
            'p_covid19' => 'required |in:0,1',
            'p_hepatitis_b' => 'required |in:0,1',
            'p_leptopspirosis' => 'required |in:0,1',
            'p_kolera' => 'required |in:0,1',
            'p_gizi_buruk' => 'required |in:0,1',
            'p_jantung' => 'required |in:0,1',
            'p_tbc_paru' => 'required |in:0,1',
            'p_kanker' => 'required |in:0,1',
            'p_diabetes' => 'required |in:0,1',
            'p_hepatitis_e' => 'required |in:0,1',
            'p_difteri' => 'required |in:0,1',
            'p_chikungunya' => 'required |in:0,1',
            'p_lumpuh' => 'required |in:0,1',
            'p_lainnya' => 'required |in:0,1',
            /* riwayat fasilitas kesehatan */
            't_rumah_sakit' => 'required',
            't_rumah_sakit_bersalin' => 'required',
            't_puskesmas_rawat_inap' => 'required',
            't_puskesmas_tanpa_rawat_inap' => 'required',
            't_puskesmas_pembantu' => 'required',
            't_poliklinik' => 'required',
            't_praktik_dokter' => 'required',
            't_rumah_bersalin' => 'required',
            't_praktik_bidan' => 'required',
            't_poskesdes' => 'required',
            't_polindes' => 'required',
            't_apotik' => 'required',
            't_khusus_obat_jamu' => 'required',
            't_posyandu' => 'required',
            't_posbindu' => 'required',
            't_praktik_dukun_bayi_bersalin' => 'required',
            'asi_ibu_ekslusif' => 'required',
            'jaminan_asuransi_kesehatan' => 'required',
            /* riwayat aktivitas fisik */
            'f_berjalan' => 'required',
            'f_olahraga' => 'required',
            'f_sepeda' => 'required',
            'f_berpergian' => 'required',
            'f_beban_ringan' => 'required',
            'f_beban_berat' => 'required',
            /* riwayat aktivitas psikis */
            'p_marah' => 'required',
            'p_kesal' => 'required',
            'p_cemas' => 'required',
            'p_tersinggung' => 'required',
            'p_sulit_tidur_istirahat' => 'required',
            'p_gelisah' => 'required',
            'p_mengantuk' => 'required',
            'p_tidak_sabar' => 'required',
            'p_bahagia' => 'required',
            /* riwayat kualitas tidur */
            'k_lama_waktu_tidur' => 'required',
            /* phbs air bersih */
            'ab_memasak_air' => 'required',
            'ab_air_sehat' => 'required',
            'ab_sumber_air' => 'required',
            /* phbs mencuci tangan */
            'mt_sebelum_sesudah_makan' => 'required',
            'mt_menggunakan_air_sabun' => 'required',
            /* phbs jamban sehat */
            'js_bab_bak' => 'required',
            'js_mudah_dibersihkan' => 'required',
            'js_membersihkan_setiap_hari' => 'required',
            /* phbs jentik nyamuk */
            'jn_menguras' => 'required',
            'jn_menutup' => 'required',
            'jn_mengubur' => 'required',
            /* phbs buah sayur */
            'bs_mengkonsumsi' => 'required',
            'bs_segar_sehat' => 'required',
            /* phbs aktivitas fisik */
            'af_olahraga' => 'required',
            /* phbs merokok */
            'r_dalam_rumah' => 'required',
            'r_asbak_rokok' => 'required',
            'r_tanpa_rokok' => 'required'
        ]);

        try {
            $newUserDetail = new UserDetail();
            $newUserDetail->user_id = \Auth::user()->id;
            $newUserDetail->nama_lengkap = $request->nama_lengkap;
            $newUserDetail->tempat_lahir = $request->tempat_lahir;
            $newUserDetail->tanggal_lahir = $request->tanggal_lahir;
            $newUserDetail->tanggal_lahir = $request->tanggal_lahir;
            $newUserDetail->jenis_kelamin = $request->jenis_kelamin;
            $newUserDetail->alamat = $request->alamat;
            $newUserDetail->rt = $request->rt;
            $newUserDetail->rw = $request->rw;
            $newUserDetail->dusun_id = $request->dusun;
            $newUserDetail->nik = $request->nik;
            $newUserDetail->pekerjaan_id = $request->pekerjaan;
            $newUserDetail->status_hubungan_id = $request->status_hubungan;
            $newUserDetail->save();

            $newRiwayatPenyakit = new RiwayatPenyakit();
            $newRiwayatPenyakit->user_detail_id = $newUserDetail->id;
            $newRiwayatPenyakit->p_ispa = $request->p_ispa;
            $newRiwayatPenyakit->p_muntaber = $request->p_muntaber;
            $newRiwayatPenyakit->p_demam_berdarah = $request->p_demam_berdarah;
            $newRiwayatPenyakit->p_campak = $request->p_campak;
            $newRiwayatPenyakit->p_malaria = $request->p_malaria;
            $newRiwayatPenyakit->p_flu_burung = $request->p_flu_burung;
            $newRiwayatPenyakit->p_covid19 = $request->p_covid19;
            $newRiwayatPenyakit->p_hepatitis_b = $request->p_hepatitis_b;
            $newRiwayatPenyakit->p_leptopspirosis = $request->p_leptopspirosis;
            $newRiwayatPenyakit->p_kolera = $request->p_kolera;
            $newRiwayatPenyakit->p_gizi_buruk = $request->p_gizi_buruk;
            $newRiwayatPenyakit->p_jantung = $request->p_jantung;
            $newRiwayatPenyakit->p_tbc_paru = $request->p_tbc_paru;
            $newRiwayatPenyakit->p_kanker = $request->p_kanker;
            $newRiwayatPenyakit->p_diabetes = $request->p_diabetes;
            $newRiwayatPenyakit->p_hepatitis_e = $request->p_hepatitis_e;
            $newRiwayatPenyakit->p_difteri = $request->p_difteri;
            $newRiwayatPenyakit->p_chikungunya = $request->p_chikungunya;
            $newRiwayatPenyakit->p_lumpuh = $request->p_lumpuh;
            $newRiwayatPenyakit->p_lainnya = $request->p_lainnya;
            $newRiwayatPenyakit->keterangan_p_lainnya = $request->keterangan_penyakit_lainnya;
            $newRiwayatPenyakit->save();

            $newFasilitasKesehatan = new RiwayatFasilitasKesehatan();
            $newFasilitasKesehatan->user_detail_id = $newUserDetail->id;
            $newFasilitasKesehatan->t_rumah_sakit = $request->t_rumah_sakit;
            $newFasilitasKesehatan->t_rumah_sakit_bersalin = $request->t_rumah_sakit_bersalin;
            $newFasilitasKesehatan->t_puskesmas_rawat_inap = $request->t_puskesmas_rawat_inap;
            $newFasilitasKesehatan->t_puskesmas_rawat_tanpa_inap = $request->t_puskesmas_tanpa_rawat_inap;
            $newFasilitasKesehatan->t_puskesmas_pembantu = $request->t_puskesmas_pembantu;
            $newFasilitasKesehatan->t_poliklinik = $request->t_poliklinik;
            $newFasilitasKesehatan->t_praktik_dokter = $request->t_praktik_dokter;
            $newFasilitasKesehatan->t_rumah_bersalin = $request->t_rumah_bersalin;
            $newFasilitasKesehatan->t_praktik_bidan = $request->t_praktik_bidan;
            $newFasilitasKesehatan->t_poskesdes = $request->t_poskesdes;
            $newFasilitasKesehatan->t_polindes = $request->t_polindes;
            $newFasilitasKesehatan->t_apotik = $request->t_apotik;
            $newFasilitasKesehatan->t_khusus_obat_jamu = $request->t_khusus_obat_jamu;
            $newFasilitasKesehatan->t_posyandu = $request->t_posyandu;
            $newFasilitasKesehatan->t_posbindu = $request->t_posbindu;
            $newFasilitasKesehatan->t_praktik_dukun_bayi_bersalin = $request->t_praktik_dukun_bayi_bersalin;
            $newFasilitasKesehatan->asi_ibu_ekslusif = $request->asi_ibu_ekslusif;
            $newFasilitasKesehatan->jaminan_asuransi_kesehatan = $request->jaminan_asuransi_kesehatan;
            $newFasilitasKesehatan->konsumsi_obat = $request->konsumsi_obat;
            $newFasilitasKesehatan->konsumsi_jamu = $request->konsumsi_jamu;
            $newFasilitasKesehatan->bpjs = $request->bpjs;
            $newFasilitasKesehatan->save();

            $newAktifitasFisik = new RiwayatAktivitasFisik();
            $newAktifitasFisik->user_detail_id = $newUserDetail->id;
            $newAktifitasFisik->f_berjalan = $request->f_berjalan;
            $newAktifitasFisik->f_olahraga = $request->f_olahraga;
            $newAktifitasFisik->f_sepeda = $request->f_sepeda;
            $newAktifitasFisik->f_berpergian = $request->f_berpergian;
            $newAktifitasFisik->f_beban_ringan = $request->f_beban_ringan;
            $newAktifitasFisik->f_beban_berat = $request->f_beban_berat;
            $newAktifitasFisik->save();

            $newAktifitasPsikis = new RiwayatAktivitasPsikis();
            $newAktifitasPsikis->user_detail_id = $newUserDetail->id;
            $newAktifitasPsikis->p_marah = $request->p_marah;
            $newAktifitasPsikis->p_kesal = $request->p_kesal;
            $newAktifitasPsikis->p_cemas = $request->p_cemas;
            $newAktifitasPsikis->p_tersinggung = $request->p_tersinggung;
            $newAktifitasPsikis->p_sulit_tidur_istirahat = $request->p_sulit_tidur_istirahat;
            $newAktifitasPsikis->p_gelisah = $request->p_gelisah;
            $newAktifitasPsikis->p_mengantuk = $request->p_mengantuk;
            $newAktifitasPsikis->p_tidak_sabar = $request->p_tidak_sabar;
            $newAktifitasPsikis->p_bahagia = $request->p_bahagia;
            $newAktifitasPsikis->save();

            $newKualitasTidur = new RiwayatKualitasTidur();
            $newKualitasTidur->user_detail_id = $newUserDetail->id;
            $newKualitasTidur->k_lama_waktu_tidur = $request->k_lama_waktu_tidur;
            $newKualitasTidur->save();

            $newPhbsAirBersih = new PhbsAirBersih();
            $newPhbsAirBersih->user_detail_id = $newUserDetail->id;
            $newPhbsAirBersih->ab_memasak_air = $request->ab_memasak_air;
            $newPhbsAirBersih->ab_air_sehat = $request->ab_air_sehat;
            $newPhbsAirBersih->ab_sumber_air = $request->ab_sumber_air;
            $newPhbsAirBersih->save();

            $newPhbsMencuciTangan = new PhbsMencuciTangan();
            $newPhbsMencuciTangan->user_detail_id = $newUserDetail->id;
            $newPhbsMencuciTangan->mt_sebelum_sesudah_makan = $request->mt_sebelum_sesudah_makan;
            $newPhbsMencuciTangan->mt_menggunakan_air_sabun = $request->mt_menggunakan_air_sabun;
            $newPhbsMencuciTangan->save();

            $newPhbsJambanSehat = new PhbsJambanSehat();
            $newPhbsJambanSehat->user_detail_id = $newUserDetail->id;
            $newPhbsJambanSehat->js_bab_bak = $request->js_bab_bak;
            $newPhbsJambanSehat->js_mudah_dibersihkan = $request->js_mudah_dibersihkan;
            $newPhbsJambanSehat->js_membersihkan_setiap_hari = $request->js_membersihkan_setiap_hari;
            $newPhbsJambanSehat->save();

            $newPhbsJentikNyamuk = new PhbsJentikNyamuk();
            $newPhbsJentikNyamuk->user_detail_id = $newUserDetail->id;
            $newPhbsJentikNyamuk->jn_menguras = $request->jn_menguras;
            $newPhbsJentikNyamuk->jn_menutup = $request->jn_menutup;
            $newPhbsJentikNyamuk->jn_mengubur = $request->jn_mengubur;
            $newPhbsJentikNyamuk->save();

            $newPhbsBuahSayur = new PhbsBuahSayur();
            $newPhbsBuahSayur->user_detail_id = $newUserDetail->id;
            $newPhbsBuahSayur->bs_mengkonsumsi = $request->bs_mengkonsumsi;
            $newPhbsBuahSayur->bs_segar_sehat = $request->bs_segar_sehat;
            $newPhbsBuahSayur->save();

            $newPhbsAktivitasFisik = new PhbsAktivitasFisik();
            $newPhbsAktivitasFisik->user_detail_id = $newUserDetail->id;
            $newPhbsAktivitasFisik->af_olahraga = $request->af_olahraga;
            $newPhbsAktivitasFisik->save();

            $newPhbsMerokok = new PhbsMerokok();
            $newPhbsMerokok->user_detail_id = $newUserDetail->id;
            $newPhbsMerokok->r_dalam_rumah = $request->r_dalam_rumah;
            $newPhbsMerokok->r_asbak_rokok = $request->r_asbak_rokok;
            $newPhbsMerokok->r_tanpa_rokok = $request->r_tanpa_rokok;
            $newPhbsMerokok->save();

            return redirect('/')->with('success', 'Berhasil Menambahkan Pendataan');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

}
