@extends('layouts.app')
@section('title')
    Tekanan Darah
@endsection

@section('content')
<style>
    *   {
   box-sizing: border-box;
}
.decoration-one {
   background-color:#009CD9;
   margin: 0;
   border:0;
   border-radius: 12px;
   padding: 9px;
   font-weight: bold;
}
a {
   text-decoration: none;
   color:black;
}
</style>
<script>
function calculateBmi(){
    var umur = document.techBMI.umur.value;
    var sistolik = document.techBMI.sistolik.value;
    var diastolik = document.techBMI.diastolik.value;
    var darahNormal = "Tekanan darah anda normal, tetap jaga kesehatan";
    var darahTinggi = "Gejala : - Pandangan kabur - Pusing - Sulit konsentrasi - Mual / Muntah - Pingsan).  Cara menangani : - Minum air yang banyak - Makan yang cukup (tidak lebih atau kurang)  - Minum vitamin penambah darah, ex : sangobion, sakatonik liver - Makan sayur-sayuran hijau (Sawi, brokoli, bayam)  - Mengonsumsi kacang-kacangan - Makanan mengandung B12 (Telur, susu, daging)  - Minuman kafein (Kopi, teh. Hal-hal yang harus dihindari : - Aktivitas yang berat - Gorengan atau makanan berminyak - Makanan pedas - Alkohol - Makanan cepat saji";
    var darahRendah = "Gejala :Nyeri dada, Gangguan penglihatan, Lemah, letih, lesu, Sakit kepala parah. Cara menangani :Olahraga rutin, Makanan yang mengandung kalium (Susu, pisang, alpukat, kentang, ubi), Mengurangi asupan gula, Makan tinggi kalsium (Kacang-kacangan, biji-bijian). Hal-hal yang harus dihindari :Alkohol, Stress, Merokok, Makanan dan minuman manis, Konsumsi garam berlebihan, Kulit ayam";
    
    if (umur < 1) {
        if (sistolik >= 65 && sistolik <=80 && diastolik >= 30 && diastolik <=55) {
            document.techBMI.meaning.value = "Tekanan darah anda Normal";
            document.techBMI.analisisHasil.value = darahTinggi;

        }else if (sistolik <65 && diastolik < 35) {
            document.techBMI.meaning.value = "Tekanan darah anda Rendah";
            document.techBMI.analisisHasil.value = darahRendah;

        }else if (sistolik >100 && diastolik > 65) {
            document.techBMI.meaning.value = "Tekanan darah anda tinggi";
            document.techBMI.analisisHasil.value = darahTinggi;

        }
    }else if (umur > 1 && umur < 5) {
        if (sistolik >= 80 && sistolik <=115 && diastolik >= 55 && diastolik <=80) {
            document.techBMI.meaning.value = "Tekanan darah anda Normal";
            document.techBMI.analisisHasil.value = darahNormal;

        }else if (sistolik <80 && diastolik < 55) {
            document.techBMI.meaning.value = "Tekanan darah anda Rendah";
            document.techBMI.analisisHasil.value = darahRendah;

        }else if (sistolik >115 && diastolik > 80) {
            document.techBMI.meaning.value = "Tekanan darah anda tinggi";
        }
    } else if (umur > 6 && umur < 13) {
        if (sistolik >= 80 && sistolik <=120 && diastolik >= 45 && diastolik <=80) {
            document.techBMI.meaning.value = "Tekanan darah anda Normal";
            document.techBMI.analisisHasil.value = darahNormal;

        }else if (sistolik <80 && diastolik < 45) {
            document.techBMI.meaning.value = "Tekanan darah anda Rendah";
            document.techBMI.analisisHasil.value = darahRendah;

        }else if (sistolik >120 && diastolik > 80) {
            document.techBMI.meaning.value = "Tekanan darah anda tinggi";
            document.techBMI.analisisHasil.value = darahTinggi;

        }
    }else if (umur > 14 && umur < 18) {
        if (sistolik >= 90 && sistolik <= 120 && diastolik >= 50 && diastolik <= 80 ) {
            document.techBMI.meaning.value = "Tekanan darah anda Normal";
            document.techBMI.analisisHasil.value = darahNormal;

        }else if (sistolik <90 && diastolik < 50) {
            document.techBMI.meaning.value = "Tekanan darah anda Rendah";
            document.techBMI.analisisHasil.value = darahRendah;

        }else if (sistolik >120 && diastolik > 80) {
            document.techBMI.meaning.value = "Tekanan darah anda tinggi";
            document.techBMI.analisisHasil.value = darahTinggi;

        }
    }else if (umur > 19 && umur < 40) {
        if (sistolik >= 95 && sistolik <= 135 && diastolik >= 60 && diastolik <= 80 ) {
            document.techBMI.meaning.value = "Tekanan darah anda Normal";
            document.techBMI.analisisHasil.value = darahNormal;

        }else if (sistolik <95 && diastolik < 60) {
            document.techBMI.meaning.value = "Tekanan darah anda Rendah";
            document.techBMI.analisisHasil.value = darahRendah;

        }else if (sistolik >135 && diastolik > 80) {
            document.techBMI.meaning.value = "Tekanan darah anda tinggi";
            document.techBMI.analisisHasil.value = darahTinggi;

        }
    }else if (umur > 41 && umur < 60) {
        if (sistolik >= 110 && sistolik <= 145 && diastolik >= 70 && diastolik <= 90 ) {
            document.techBMI.meaning.value = "Tekanan darah anda Normal";
            document.techBMI.analisisHasil.value = darahNormal;

        }else if (sistolik <110 && diastolik < 70) {
            document.techBMI.meaning.value = "Tekanan darah anda Rendah";
            document.techBMI.analisisHasil.value = darahRendah;

        }else if (sistolik >145 && diastolik > 90) {
            document.techBMI.meaning.value = "Tekanan darah anda tinggi";
            document.techBMI.analisisHasil.value = darahTinggi;

        }
    }else if(umur>60){
        if (sistolik >= 95 && sistolik <= 145 && diastolik >= 70 && diastolik <= 90 ) {
            document.techBMI.meaning.value = "Tekanan darah anda Normal";
            document.techBMI.analisisHasil.value = darahNormal;

        }else if (sistolik <95 && diastolik < 70) {
            document.techBMI.meaning.value = "Tekanan darah anda Rendah";
            document.techBMI.analisisHasil.value = darahRendah;

        }else if (sistolik >145 && diastolik > 90) {
            document.techBMI.meaning.value = "Tekanan darah anda tinggi";
            document.techBMI.analisisHasil.value = darahTinggi;

        }
    } else {
        document.techBMI.meaning.value = "Harap cek ulang tekanan darah anda dengan benar";
    }
}
</script>
<div>
    <form name="techBMI">
        <br>
    <h3 class="sipenpin-subtitle">Cek Tekanan Darah</h3>
    <br/>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Umur</span>
                </div>
                <input type="number" name="umur" class="form-control" placeholder="Umur (tahun)" size="20" required>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Sistolik</span>
                </div>
                <input type="number" name="sistolik" class="form-control" placeholder="Sistolik (mmHg)" size="20" required>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Diastolik</span>
                </div>
                <input type="number" name="diastolik" class="form-control" placeholder="Diastolik (mmHg)" size="20" required>
            </div>
        </div>
    </div>
    <br>
    <input class="decoration-one px-3 py-2" style="color: #ffff" type="button" value="Tekanan Darah" onClick="calculateBmi()"><br /><br/>
    
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Hasil BMI</span>
                </div>
                <input type="text" name="meaning" class="form-control" placeholder="Hasil BMI" size="20" readonly>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div>
                <div class="text-center">
                    <br>
                    <h3>Hasil Analisis dan Saran</h3>
                    <br>
                </div>
                <textarea id="analisisHasil" name="analisisHasil" rows="10" placeholder="Analisis dan Saran...." class="form-control" cols="50" rows="10"style="white-space: pre-wrap" readonly></textarea>

            </div>
        </div>
    </div>
    <input class="decoration-one px-3 py-2" style="color: #ffff" type="reset" value="Reset" />
    <br/>
    </form>
</div>
<br>
@endsection