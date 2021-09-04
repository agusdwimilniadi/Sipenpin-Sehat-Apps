@extends('layouts.app')
@section('title')
    Kadar Oksigen
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
function calculateBmi() {
    var gasDarah = document.techBMI.weight.value;
    var oximeter = document.techBMI.height.value;
    
    if (gasDarah >= 80 && gasDarah <=100 && oximeter >=95 && oximeter <=100) {
        document.techBMI.meaning.value = "Kadar oksigen dalam darah anda Normal";
        document.techBMI.analisisHasil.value = "Semuanya normal, tetap jaga kesehatan";
    } else if (gasDarah >= 120 && oximeter >=100) {
        document.techBMI.meaning.value = "Kadar oksigen dalam darah anda Tinggi";
        document.techBMI.analisisHasil.value = "Gejala nya seperi kejang-kejang, sakit dada, tidak sadarkan diri. Cara menangani => Alat bantu pernapasan dengan tabung oksigen";

    }else if (gasDarah <= 80 && oximeter <=94 ) {
        document.techBMI.meaning.value = "Kadar oksigen dalam darah anda Rendah";
        document.techBMI.analisisHasil.value = "Gejala nya seperti nyeri dada, sesak napas, batuk, sakit kepala, detak jantung cepat, kebingungan, dan kulit membiru. Cara menangani => Mengonsumsi makanan kaya antioksidan (kacang merah, jeruk, delima, strawberry, kurma, anggur), makanan zat besi (Sayur, unggas, roti), sering-sering membuka jendela dan pintu rumah agar pasokan udara masuk lebih banyak, rajin olahraga, terapi oksigen dan pemberian bantuan pernapasan melalui mesin ventilator";

    } else {
        document.techBMI.meaning.value = "Harap tes ulang kadar oksigen dengan benar";
    }
}
</script>

<div>
    <form name="techBMI">
        <br>
    <h3 class="sipenpin-subtitle">Kadar Oksigen</h3>
    <br/>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Gas Darah (PaO2): </span>
                </div>
                <input type="number" name="weight" class="form-control" placeholder="Gas darah (PaO2)" size="20" required>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Oximeter (SpO2)</span>
                </div>
                <input type="number" name="height" class="form-control" placeholder="Oximeter (SpO2) %" size="20" required>
            </div>
        </div>
    </div>
    <br>
    <input class="decoration-one px-3 py-2" style="color: #ffff" type="button" value="Hitung BMI" onClick="calculateBmi()"><br/><br/>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Hasil Analisis</span>
                </div>
                <input type="text" name="meaning" class="form-control" placeholder="Hasil Analisis" size="20" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div>
                <div class="text-center">
                    <br>
                    <h3>Hasil Analisis dan Saran</h3>
                    <br>
                </div>
                <textarea id="analisisHasil" name="analisisHasil" rows="10" placeholder="Analisis dan Saran....." class="form-control" cols="50" rows="10"style="white-space: pre-wrap" readonly></textarea>

            </div>
        </div>
    </div>
    <br>
    <input class="decoration-one px-3 py-2" style="color: #ffff" type="reset" value="Reset" />
    <br/>
    </form>
</div>
<br>
@endsection