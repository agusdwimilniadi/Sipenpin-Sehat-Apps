<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PhbsAirBersih;

class AdminStatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Superadmin|Admin Kesehatan']);
    }

    public function index()
    {
    /* chart phbs */
        $chartsAirBersih = \DB::table('phbs_air_bersih')
        ->get(array(
            \DB::raw('SUM(ab_memasak_air) AS ab_memasak_air'),
            \DB::raw('SUM(ab_air_sehat) AS ab_air_sehat'),
            \DB::raw('SUM(ab_sumber_air) AS ab_sumber_air'),
        ));

        $chartsAktivitasFisik = \DB::table('phbs_aktivitas_fisik')
        ->get(array(
            \DB::raw('SUM(af_olahraga) AS af_olahraga'),
        ));

        $chartsBuahSayur = \DB::table('phbs_buah_sayur')
        ->get(array(
            \DB::raw('SUM(bs_mengkonsumsi) AS bs_mengkonsumsi'),
            \DB::raw('SUM(bs_segar_sehat) AS bs_segar_sehat'),
        ));

        $chartsJambanSehat = \DB::table('phbs_jamban_sehat')
        ->get(array(
            \DB::raw('SUM(js_bab_bak) AS js_bab_bak'),
            \DB::raw('SUM(js_mudah_dibersihkan) AS js_mudah_dibersihkan'),
            \DB::raw('SUM(js_membersihkan_setiap_hari) AS js_membersihkan_setiap_hari'),
        ));

        $chartsJentikNyamuk = \DB::table('phbs_jentik_nyamuk')
        ->get(array(
            \DB::raw('SUM(jn_menguras) AS jn_menguras'),
            \DB::raw('SUM(jn_menutup) AS jn_menutup'),
            \DB::raw('SUM(jn_mengubur) AS jn_mengubur'),
        ));

        $chartsMencuciTangan = \DB::table('phbs_mencuci_tangan')
        ->get(array(
            \DB::raw('SUM(mt_sebelum_sesudah_makan) AS mt_sebelum_sesudah_makan'),
            \DB::raw('SUM(mt_menggunakan_air_sabun) AS mt_menggunakan_air_sabun'),
        ));

        $chartsRokok = \DB::table('phbs_rokok')
        ->get(array(
            \DB::raw('SUM(r_dalam_rumah) AS r_dalam_rumah'),
            \DB::raw('SUM(r_asbak_rokok) AS r_asbak_rokok'),
            \DB::raw('SUM(r_tanpa_rokok) AS r_tanpa_rokok'),
        ));
    /* end chart phbs */

    /* chart riwayat aktivitass */
        $chartAktivitasFisik = \DB::table('riwayat_aktivitas_fisik')
        ->get(array(
            \DB::raw('SUM(f_berjalan) AS f_berjalan'),
            \DB::raw('SUM(f_olahraga) AS f_olahraga'),
            \DB::raw('SUM(f_sepeda) AS f_sepeda'),
            \DB::raw('SUM(f_berpergian) AS f_berpergian'),
            \DB::raw('SUM(f_beban_ringan) AS f_beban_ringan'),
            \DB::raw('SUM(f_beban_berat) AS f_beban_berat')
        ));
        $chartAktivitasPsikis = \DB::table('riwayat_aktivitas_psikis')
        ->get(array(
            \DB::raw('SUM(p_marah) AS p_marah'),
            \DB::raw('SUM(p_kesal) AS p_kesal'),
            \DB::raw('SUM(p_cemas) AS p_cemas'),
            \DB::raw('SUM(p_tersinggung) AS p_tersinggung'),
            \DB::raw('SUM(p_sulit_tidur_istirahat) AS p_sulit_tidur_istirahat'),
            \DB::raw('SUM(p_gelisah) AS p_gelisah'),
            \DB::raw('SUM(p_mengantuk) AS p_mengantuk'),
            \DB::raw('SUM(p_tidak_sabar) AS p_tidak_sabar'),
            \DB::raw('SUM(p_bahagia) AS p_bahagia')
        ));
        $chartKualitasTidur1 = \DB::table('riwayat_kualitas_tidur')->where('k_lama_waktu_tidur', '=', 1)->count('k_lama_waktu_tidur');
        $chartKualitasTidur2 = \DB::table('riwayat_kualitas_tidur')->where('k_lama_waktu_tidur', '=', 2)->count('k_lama_waktu_tidur');
        $chartKualitasTidur3 = \DB::table('riwayat_kualitas_tidur')->where('k_lama_waktu_tidur', '=', 3)->count('k_lama_waktu_tidur');
    /* end riwayat aktivitass */

    /* chart riwayat fasilitas kesehatan */
        $chartFasilitasKesehatan = \DB::table('riwayat_fasilitas_kesehatan')
        ->get(array(
            \DB::raw('SUM(t_rumah_sakit) AS t_rumah_sakit'),
            \DB::raw('SUM(t_rumah_sakit_bersalin) AS t_rumah_sakit_bersalin'),
            \DB::raw('SUM(t_puskesmas_rawat_inap) AS t_puskesmas_rawat_inap'),
            \DB::raw('SUM(t_puskesmas_rawat_tanpa_inap) AS t_puskesmas_rawat_tanpa_inap'),
            \DB::raw('SUM(t_puskesmas_pembantu) AS t_puskesmas_pembantu'),
            \DB::raw('SUM(t_poliklinik) AS t_poliklinik'),
            \DB::raw('SUM(t_praktik_dokter) AS t_praktik_dokter'),
            \DB::raw('SUM(t_rumah_bersalin) AS t_rumah_bersalin'),
            \DB::raw('SUM(t_praktik_bidan) AS t_praktik_bidan'),
            \DB::raw('SUM(t_poskesdes) AS t_poskesdes'),
            \DB::raw('SUM(t_polindes) AS t_polindes'),
            \DB::raw('SUM(t_apotik) AS t_apotik'),
            \DB::raw('SUM(t_khusus_obat_jamu) AS t_khusus_obat_jamu'),
            \DB::raw('SUM(t_posyandu) AS t_posyandu'),
            \DB::raw('SUM(t_posbindu) AS t_posbindu'),
            \DB::raw('SUM(t_praktik_dukun_bayi_bersalin) AS t_praktik_dukun_bayi_bersalin'),
            \DB::raw('SUM(asi_ibu_ekslusif) AS asi_ibu_ekslusif'),
        ));
    /* end riwayat fasilitas kesehatan */

    /* chart riwayat penyakit */
        $chartPenyakit = \DB::table('riwayat_penyakit')
        ->get(array(
            \DB::raw('SUM(p_ispa) AS p_ispa'),
            \DB::raw('SUM(p_muntaber) AS p_muntaber'),
            \DB::raw('SUM(p_demam_berdarah) AS p_demam_berdarah'),
            \DB::raw('SUM(p_campak) AS p_campak'),
            \DB::raw('SUM(p_malaria) AS p_malaria'),
            \DB::raw('SUM(p_flu_burung) AS p_flu_burung'),
            \DB::raw('SUM(p_covid19) AS p_covid19'),
            \DB::raw('SUM(p_hepatitis_b) AS p_hepatitis_b'),
            \DB::raw('SUM(p_leptopspirosis) AS p_leptopspirosis'),
            \DB::raw('SUM(p_kolera) AS p_kolera'),
            \DB::raw('SUM(p_gizi_buruk) AS p_gizi_buruk'),
            \DB::raw('SUM(p_jantung) AS p_jantung'),
            \DB::raw('SUM(p_tbc_paru) AS p_tbc_paru'),
            \DB::raw('SUM(p_kanker) AS p_kanker'),
            \DB::raw('SUM(p_diabetes) AS p_diabetes'),
            \DB::raw('SUM(p_hepatitis_e) AS p_hepatitis_e'),
            \DB::raw('SUM(p_difteri) AS p_difteri'),
            \DB::raw('SUM(p_chikungunya) AS p_chikungunya'),
            \DB::raw('SUM(p_lumpuh) AS p_lumpuh'),
            \DB::raw('SUM(p_lainnya) AS p_lainnya'),
        ));
    /* end riwayat penyakit */

        return view('admin.superadmin.statistik', ['chartsAirBersih' => $chartsAirBersih, 'chartsAktivitasFisik' => $chartsAktivitasFisik, 'chartsBuahSayur' => $chartsBuahSayur, 'chartsJambanSehat' => $chartsJambanSehat, 'chartsJentikNyamuk' => $chartsJentikNyamuk, 'chartsMencuciTangan' => $chartsMencuciTangan, 'chartsRokok' => $chartsRokok, 'chartAktivitasFisik' => $chartAktivitasFisik, 'chartAktivitasPsikis' => $chartAktivitasPsikis, 'chartKualitasTidur1' => $chartKualitasTidur1, 'chartKualitasTidur2' => $chartKualitasTidur2, 'chartKualitasTidur3' => $chartKualitasTidur3, 'chartFasilitasKesehatan' => $chartFasilitasKesehatan, 'chartPenyakit' => $chartPenyakit])->with('onSide', 'statistik');
    }
}
