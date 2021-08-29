@extends('layouts.app')
@section('title')
    Cek Gizi
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
function calculateScore() {
var weight = document.techBMI.weight.value
var height = (document.techBMI.height.value)/100
if(weight > 0 && height > 0){	
var finalBmi = weight/(height*height)
document.techBMI.bmi.value = finalBmi.toFixed(3);
if(finalBmi < 18.5){
document.techBMI.meaning.value = "Anda terlalu kurus."
    }
if(finalBmi > 18.5 && finalBmi < 25){
document.techBMI.meaning.value = "Anda cukup sehat."
    }
if(finalBmi > 25 &&  finalBmi <30){
document.techBMI.meaning.value = "Anda Kelebihan Berat Badan"
    }
if(finalBmi > 30){
document.techBMI.meaning.value = "Anda kelebihan berat badan."
    }
    }

    }
</script>
<div>
    <form name="techBMI">
        <br>
    <h3 class="sipenpin-subtitle">BMI Calculator</h3>
    <br/>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Berat Badan</span>
                </div>
                <input type="text" name="weight" class="form-control" placeholder="Berat (kg)" size="20" required>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="input-group has-validation">
                <div class="input-group-prepend">
                  <span class="input-group-text">Tinggi Badan</span>
                </div>
                <input type="text" name="height" class="form-control" placeholder="Tinggi (Cm)" size="20" required>
            </div>
        </div>
    </div>
    <br>
    <input class="decoration-one px-3 py-2" style="color: #ffff" type="button" value="Hitung BMI" onClick="calculateBmi()"><br /><br/>
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
    <a href=""></a>
    </form>
</div>
<br>
@endsection