@extends('admin.core.core-dashboard')
@section('onPage', 'Data Statistik')

@section('extraCSS')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<style>

</style>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik PHBS</h6>
            </div>
            <div class="card-body">
                <div id="chart_phbs_air_bersih" style="height: 500px"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Riwayat Aktivitas - Fisik</h6>
            </div>
            <div class="card-body">
                <div id="chart_riwayat_aktivitas_fisik" style="height: 400px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Riwayat Aktivitas - Psikis</h6>
            </div>
            <div class="card-body">
                <div id="chart_riwayat_aktivitas_psikis" style="height: 400px"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Riwayat Aktivitas - Frekuensi Tidur</h6>
            </div>
            <div class="card-body">
                <div id="chart_riwayat_aktivitas_tidur" style="height: 400px"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Riwayat Fasilitas Kesehatan</h6>
            </div>
            <div class="card-body">
                <div id="charts_fasilitas_kesehatan" style="height: 500px"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Asuransi Kesehatan</h6>
            </div>
            <div class="card-body">
                <div id="charts_asuransi_kesehatan" style="height: 500px"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Riwayat Penyakit</h6>
            </div>
            <div class="card-body">
                <div id="charts_riwayat_penyakit" style="height: 800px"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extraJS')

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    /* airBersih */
        var memasak_air = 0;
        var air_sehat = 0;
        var sumber_air = 0;

        <?php
            foreach($chartsAirBersih as $chartsAirBersih) {
        ?>
                memasak_air = <?php echo $chartsAirBersih->ab_memasak_air ?>;
                air_sehat = <?php echo $chartsAirBersih->ab_air_sehat ?>;
                sumber_air = <?php echo $chartsAirBersih->ab_sumber_air ?>;
        <?php
            }
        ?>
    /* EndAirBersih */

    /* aktivitasFisik */
        var olahraga = 0;

        <?php
            foreach($chartsAktivitasFisik as $chartsAktivitasFisik) {
        ?>
            olahraga = <?php echo $chartsAktivitasFisik->af_olahraga ?>;
        <?php
            }
        ?>
    /* EndaktivitasFisik */
    
    /* airBersih */
        var bs_mengkonsumsi = 0;
        var bs_segar_sehat = 0;

        <?php
            foreach($chartsBuahSayur as $chartsBuahSayur) {
        ?>
                bs_mengkonsumsi = <?php echo $chartsBuahSayur->bs_mengkonsumsi ?>;
                bs_segar_sehat = <?php echo $chartsBuahSayur->bs_segar_sehat ?>;
        <?php
            }
        ?>
    /* EndAirBersih */

    /* jambanSehat */
        var js_bab_bak = 0;
        var js_mudah_dibersihkan = 0;
        var js_membersihkan_setiap_hari = 0;

        <?php
            foreach($chartsJambanSehat as $chartsJambanSehat) {
        ?>
                js_bab_bak = <?php echo $chartsJambanSehat->js_bab_bak ?>;
                js_mudah_dibersihkan = <?php echo $chartsJambanSehat->js_mudah_dibersihkan ?>;
                js_membersihkan_setiap_hari = <?php echo $chartsJambanSehat->js_membersihkan_setiap_hari ?>;
        <?php
            }
        ?>
    /* EndjambanSehat */

    /* jentikNyamuk */
        var jn_menguras = 0;
        var jn_menutup = 0;
        var jn_mengubur = 0;

        <?php
            foreach($chartsJentikNyamuk as $chartsJentikNyamuk) {
        ?>
                jn_menguras = <?php echo $chartsJentikNyamuk->jn_menguras ?>;
                jn_menutup = <?php echo $chartsJentikNyamuk->jn_menutup ?>;
                jn_mengubur = <?php echo $chartsJentikNyamuk->jn_mengubur ?>;
        <?php
            }
        ?>
    /* EndjentikNyamuk */

    /* mencucitangan */
        var mt_sebelum_sesudah_makan = 0;
        var mt_menggunakan_air_sabun = 0;

        <?php
            foreach($chartsMencuciTangan as $chartsMencuciTangan) {
        ?>
            mt_sebelum_sesudah_makan = <?php echo $chartsMencuciTangan->mt_sebelum_sesudah_makan ?>;
            mt_menggunakan_air_sabun = <?php echo $chartsMencuciTangan->mt_menggunakan_air_sabun ?>;
        <?php
            }
        ?>
    /* Endmencucitangan */

    /* mencucitangan */
        var r_dalam_rumah = 0;
        var r_asbak_rokok = 0;
        var r_tanpa_rokok = 0;

        <?php
            foreach($chartsRokok as $chartsRokok) {
        ?>
            r_dalam_rumah = <?php echo $chartsRokok->r_dalam_rumah ?>;
            r_asbak_rokok = <?php echo $chartsRokok->r_asbak_rokok ?>;
            r_tanpa_rokok = <?php echo $chartsRokok->r_tanpa_rokok ?>;
        <?php
            }
        ?>
    /* Endmencucitangan */
    
    
    var sumAirBersih = memasak_air + air_sehat + sumber_air;
    var sumBuahSayur = bs_mengkonsumsi + bs_segar_sehat;
    var sumJambanSehat = js_bab_bak + js_mudah_dibersihkan + js_membersihkan_setiap_hari;
    var sumJentikNyamuk = jn_menguras + jn_menutup + jn_mengubur;
    var sumMencuciTangan = mt_sebelum_sesudah_makan + mt_menggunakan_air_sabun;
    var sumRokok = r_dalam_rumah + r_asbak_rokok + r_tanpa_rokok;

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jenis', 'value'],
            ['PHBS Air Bersih', sumAirBersih],
            ['PHBS Aktivitas Fisik', olahraga],
            ['PHBS Buah Sayur', sumBuahSayur],
            ['PHBS Jamban Sehat', sumJambanSehat],
            ['PHBS Jentik Nyamuk', sumJentikNyamuk],
            ['PHBS Mencuci Tangan', sumMencuciTangan],
            ['PHBS Merokok', sumRokok],
        ]);
        var options = {
            title: 'Data Statistik PHBS',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_phbs_air_bersih'));

        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

        var f_berjalan = 0;
        var f_olahraga = 0;
        var f_sepeda = 0;
        var f_berpergian = 0;
        var f_beban_ringan = 0;
        var f_beban_berat = 0;

        <?php
            foreach($chartAktivitasFisik as $chartAktivitasFisik) {
        ?>
                f_berjalan = <?php echo $chartAktivitasFisik->f_berjalan ?>;
                f_olahraga = <?php echo $chartAktivitasFisik->f_olahraga ?>;
                f_sepeda = <?php echo $chartAktivitasFisik->f_sepeda ?>;
                f_berpergian = <?php echo $chartAktivitasFisik->f_berpergian ?>;
                f_beban_ringan = <?php echo $chartAktivitasFisik->f_beban_ringan ?>;
                f_beban_berat = <?php echo $chartAktivitasFisik->f_beban_berat ?>;
        <?php
            }
        ?>

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jenis', 'value'],
            ['Frekuensi Berjalan', f_berjalan],
            ['Frekuensi Olahraga', f_olahraga],
            ['Frekuensi Bersepeda', f_sepeda],
            ['Frekuensi Berpergian', f_berpergian],
            ['Frekuensi Beban Ringan', f_beban_ringan],
            ['Frekuensi Beban Berat', f_beban_berat],
        ]);
        var options = {
            title: 'Data Statistik Aktivitas Fisik',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_riwayat_aktivitas_fisik'));

        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

        var p_marah = 0;
        var p_kesal = 0;
        var p_cemas = 0;
        var p_tersinggung = 0;
        var p_sulit_tidur_istirahat = 0;
        var p_gelisah = 0;
        var p_mengantuk = 0;
        var p_tidak_sabar = 0;
        var p_bahagia = 0;

        <?php
            foreach($chartAktivitasPsikis as $chartAktivitasPsikis) {
        ?>
                p_marah = <?php echo $chartAktivitasPsikis->p_marah ?>;
                p_kesal = <?php echo $chartAktivitasPsikis->p_kesal ?>;
                p_cemas = <?php echo $chartAktivitasPsikis->p_cemas ?>;
                p_tersinggung = <?php echo $chartAktivitasPsikis->p_tersinggung ?>;
                p_sulit_tidur_istirahat = <?php echo $chartAktivitasPsikis->p_sulit_tidur_istirahat ?>;
                p_gelisah = <?php echo $chartAktivitasPsikis->p_gelisah ?>;
                p_mengantuk = <?php echo $chartAktivitasPsikis->p_mengantuk ?>;
                p_tidak_sabar = <?php echo $chartAktivitasPsikis->p_tidak_sabar ?>;
                p_bahagia = <?php echo $chartAktivitasPsikis->p_bahagia ?>;
        <?php
            }
        ?>

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jenis', 'value'],
            ['Mudah Marah', p_marah],
            ['Mudah Kesal', p_kesal],
            ['Mudah Cemas', p_cemas],
            ['Mudah Tersinggung', p_tersinggung],
            ['Sulit Tidur', p_sulit_tidur_istirahat],
            ['Mudah Gelisah', p_gelisah],
            ['Mudah Mengantuk', p_mengantuk],
            ['Tidak Sabar', p_tidak_sabar],
            ['Mudah Bahagia', p_bahagia],
        ]);
        var options = {
            title: 'Data Statistik Aktivitas Psikis',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_riwayat_aktivitas_psikis'));

        chart.draw(data, options);
    }
</script>


<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    var kualitas1 = <?php echo $chartKualitasTidur1 ?>;
    var kualitas2 = <?php echo $chartKualitasTidur2 ?>;
    var kualitas3 = <?php echo $chartKualitasTidur3 ?>;

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jenis', 'value'],
            ['Kurang dari 6 jam / hari', kualitas1],
            ['6 - 8 jam / hari', kualitas2],
            ['Lebih dari 8 jam / hari', kualitas3],
        ]);
        var options = {
            title: 'Data Kualitas Tidur',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_riwayat_aktivitas_tidur'));

        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    var kualitas1 = <?php echo $chartJaminan1 ?>;
    var kualitas2 = <?php echo $chartJaminan2 ?>;
    var kualitas3 = <?php echo $chartJaminan3 ?>;
    var kualitas4 = <?php echo $chartJaminan4 ?>;
    var kualitas5 = <?php echo $chartJaminan5 ?>;

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jenis', 'value'],
            ['Asuransi kesehatan secara mandiri (Prudential, Manulife, dsb)', kualitas1],
            ['Kartu Indonesia Sehat', kualitas2],
            ['Kartu BPJS Kesehatan', kualitas3],
            ['Kartu BPJS Ketenagakerjaan', kualitas4],
            ['Belum punya', kualitas5],
        ]);
        var options = {
            title: 'Data Asuransi Kesehatan',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('charts_asuransi_kesehatan'));

        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

        var t_rumah_sakit = 0;
        var t_rumah_sakit_bersalin = 0;
        var t_puskesmas_rawat_inap = 0;
        var t_puskesmas_rawat_tanpa_inap = 0;
        var t_puskesmas_pembantu = 0;
        var t_poliklinik = 0;
        var t_praktik_dokter = 0;
        var t_rumah_bersalin = 0;
        var t_praktik_bidan = 0;
        var t_poskesdes = 0;
        var t_polindes = 0;
        var t_apotik = 0;
        var t_khusus_obat_jamu = 0;
        var t_posyandu = 0;
        var t_posbindu = 0;
        var t_praktik_dukun_bayi_bersalin = 0;
        var asi_ibu_ekslusif = 0;

        <?php
            foreach($chartFasilitasKesehatan as $chartFasilitasKesehatan) {
        ?>
                t_rumah_sakit = <?php echo $chartFasilitasKesehatan->t_rumah_sakit ?>;
                t_rumah_sakit_bersalin = <?php echo $chartFasilitasKesehatan->t_rumah_sakit_bersalin ?>;
                t_puskesmas_rawat_inap = <?php echo $chartFasilitasKesehatan->t_puskesmas_rawat_inap ?>;
                t_puskesmas_rawat_tanpa_inap = <?php echo $chartFasilitasKesehatan->t_puskesmas_rawat_tanpa_inap ?>;
                t_puskesmas_pembantu = <?php echo $chartFasilitasKesehatan->t_puskesmas_pembantu ?>;
                t_poliklinik = <?php echo $chartFasilitasKesehatan->t_poliklinik ?>;
                t_praktik_dokter = <?php echo $chartFasilitasKesehatan->t_praktik_dokter ?>;
                t_rumah_bersalin = <?php echo $chartFasilitasKesehatan->t_rumah_bersalin ?>;
                t_praktik_bidan = <?php echo $chartFasilitasKesehatan->t_praktik_bidan ?>;
                t_poskesdes = <?php echo $chartFasilitasKesehatan->t_poskesdes ?>;
                t_polindes = <?php echo $chartFasilitasKesehatan->t_polindes ?>;
                t_apotik = <?php echo $chartFasilitasKesehatan->t_apotik ?>;
                t_khusus_obat_jamu = <?php echo $chartFasilitasKesehatan->t_khusus_obat_jamu ?>;
                t_posyandu = <?php echo $chartFasilitasKesehatan->t_posyandu ?>;
                t_posbindu = <?php echo $chartFasilitasKesehatan->t_posbindu ?>;
                t_praktik_dukun_bayi_bersalin = <?php echo $chartFasilitasKesehatan->t_praktik_dukun_bayi_bersalin ?>;
                asi_ibu_ekslusif = <?php echo $chartFasilitasKesehatan->asi_ibu_ekslusif ?>;
        <?php
            }
        ?>

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jenis', 'value'],
            ['Rumah Sakit', t_rumah_sakit],
            ['Rumah Sakit Bersalin', t_rumah_sakit_bersalin],
            ['Puskesmas Rawat Inap', t_puskesmas_rawat_inap],
            ['Puskesmas Tanpa Rawat Inap', t_puskesmas_rawat_tanpa_inap],
            ['Puskesmas Pembantu', t_puskesmas_pembantu],
            ['Poliklinik', t_poliklinik],
            ['Praktik Dokter', t_praktik_dokter],
            ['Rumah Bersalin', t_rumah_bersalin],
            ['Praktik Bidan', t_praktik_bidan],
            ['Poskesdes', t_poskesdes],
            ['Polindes', t_polindes],
            ['Apotik', t_apotik],
            ['Tempat Khusus Obat / Jamu', t_khusus_obat_jamu],
            ['Posyandu', t_posyandu],
            ['Posbindu', t_posbindu],
            ['Tempat Praktik Dukun Bayi / Bersalin', t_praktik_dukun_bayi_bersalin],
            ['ASI Ekslusif', asi_ibu_ekslusif],
        ]);
        var options = {
            title: 'Data Statistik Fasilitas Kesehatan - 4 Bulan Terakhir',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('charts_fasilitas_kesehatan'));

        chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

        var p_ispa = 0;
        var p_muntaber = 0;
        var p_demam_berdarah = 0;
        var p_campak = 0;
        var p_malaria = 0;
        var p_flu_burung = 0;
        var p_covid19 = 0;
        var p_hepatitis_b = 0;
        var p_leptopspirosis = 0;
        var p_kolera = 0;
        var p_gizi_buruk = 0;
        var p_jantung = 0;
        var p_tbc_paru = 0;
        var p_kanker = 0;
        var p_diabetes = 0;
        var p_hepatitis_e = 0;
        var p_difteri = 0;
        var p_chikungunya = 0;
        var p_lumpuh = 0;
        var p_lainnya = 0;

        <?php
            foreach($chartPenyakit as $chartPenyakit) {
        ?>
                p_ispa = <?php echo $chartPenyakit->p_ispa ?>;
                p_muntaber = <?php echo $chartPenyakit->p_muntaber ?>;
                p_demam_berdarah = <?php echo $chartPenyakit->p_demam_berdarah ?>;
                p_campak = <?php echo $chartPenyakit->p_campak ?>;
                p_malaria = <?php echo $chartPenyakit->p_malaria ?>;
                p_flu_burung = <?php echo $chartPenyakit->p_flu_burung ?>;
                p_covid19 = <?php echo $chartPenyakit->p_covid19 ?>;
                p_hepatitis_b = <?php echo $chartPenyakit->p_hepatitis_b ?>;
                p_leptopspirosis = <?php echo $chartPenyakit->p_leptopspirosis ?>;
                p_kolera = <?php echo $chartPenyakit->p_kolera ?>;
                p_gizi_buruk = <?php echo $chartPenyakit->p_gizi_buruk ?>;
                p_jantung = <?php echo $chartPenyakit->p_jantung ?>;
                p_tbc_paru = <?php echo $chartPenyakit->p_tbc_paru ?>;
                p_kanker = <?php echo $chartPenyakit->p_kanker ?>;
                p_diabetes = <?php echo $chartPenyakit->p_diabetes ?>;
                p_hepatitis_e = <?php echo $chartPenyakit->p_hepatitis_e ?>;
                p_difteri = <?php echo $chartPenyakit->p_difteri ?>;
                p_chikungunya = <?php echo $chartPenyakit->p_chikungunya ?>;
                p_lumpuh = <?php echo $chartPenyakit->p_lumpuh ?>;
                p_lainnya = <?php echo $chartPenyakit->p_lainnya ?>;
        <?php
            }
        ?>

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Jenis', 'value'],
            ['Ispa', p_ispa],
            ['Muntaber', p_muntaber],
            ['Demam Berdarah', p_demam_berdarah],
            ['Campak', p_campak],
            ['Malaria', p_malaria],
            ['Flu Burung', p_flu_burung],
            ['Covid-19', p_covid19],
            ['Hepatitis B', p_hepatitis_b],
            ['Leptopspirosis', p_leptopspirosis],
            ['Kolera', p_kolera],
            ['Gizi Buruk', p_gizi_buruk],
            ['Jantung', p_jantung],
            ['TBC Paru', p_tbc_paru],
            ['Kanker', p_kanker],
            ['Diabetes', p_diabetes],
            ['Hepatitis E', p_hepatitis_e],
            ['Difteri', p_difteri],
            ['Chikungunya', p_chikungunya],
            ['Lumpuh', p_lumpuh],
            ['Lainnya', p_lainnya],
        ]);
        var options = {
            title: 'Data Statistik Fasilitas Kesehatan - 4 Bulan Terakhir',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('charts_riwayat_penyakit'));

        chart.draw(data, options);
    }
</script>

</script>
@endsection