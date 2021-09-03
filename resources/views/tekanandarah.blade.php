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
    
    if (umur < 1) {
        if (sistolik >= 65 && sistolik <=80 && diastolik >= 30 && diastolik <=55) {
            document.techBMI.meaning.value = "Anda Normal";
        }else if (sistolik <65 && diastolik < 35) {
            document.techBMI.meaning.value = "Anda Rendah";
        }else if (sistolik >100 && diastolik > 65) {
            document.techBMI.meaning.value = "Anda TInggi";
        }
    } else {
        document.techBMI.meaning.value = "Inputan anda kurang tepat";
    }


    // var sistolik = (document.techBMI.sistolik.value)/100
    // if(umur > 0 && sistolik > 0){	
    // var finalBmi = umur/(sistolik*sistolik)
    // document.techBMI.bmi.value = finalBmi.toFixed(3);
    // if(finalBmi < 18.5){
    // document.techBMI.meaning.value = "Anda terlalu kurus."
    //     }
    // if(finalBmi > 18.5 && finalBmi < 25){
    // document.techBMI.meaning.value = "Anda cukup sehat."
    //     }
    // if(finalBmi > 25 &&  finalBmi <30){
    // document.techBMI.meaning.value = "Anda Kelebihan Berat Badan"
    //     }
    // if(finalBmi > 30){
    // document.techBMI.meaning.value = "Anda kelebihan berat badan."
    //     }
    //     }
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
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Skor BMI</span>
                </div>
                <input type="text" name="bmi" class="form-control" placeholder="Skor BMI" size="20" readonly>
            </div>
        </div>
    </div>
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
    <input class="decoration-one px-3 py-2" style="color: #ffff" type="reset" value="Reset" />
    <br/>
    </form>
</div>
<br>
@endsection