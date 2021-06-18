@extends('layouts.app')
@section('title')
    Call Center Darurat
@endsection
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>

/* WA Form */
body{font-family:'Roboto',Arial,sans-serif}.none{display:none}

/* Input Field CSS */
.datainput{position:relative;margin:5px 0 20px}.datainput p{font-size:12px;background:#eee;display:inline-block;padding:5px 15px;border-radius:.5rem}.whatsapp-form textarea{min-height:120px}.datainput select{padding:12px 0;color:#555;font-size:14px;width:100%;border:0;border-bottom:1px solid #ddd;outline:none;background:#fff}.datainput input,.datainput textarea{font-size:15px;padding:15px 0;display:block;width:100%;border:none;border-bottom:1px solid #ddd}.datainput input:focus,.datainput textarea:focus{outline:none}.datainput label{color:#999;font-size:14px;font-weight:400;position:absolute;pointer-events:none;left:0;top:18px;transition:.2s ease all}.datainput input:focus~label,.datainput input:valid~label,.datainput textarea:focus~label,.datainput textarea:valid~label{top:-10px;font-size:14px;color:#009CD9}#notif-license span{font-size:40px}#notif-license{display:none;position:fixed}.bar{position:relative;display:block;width:100%}.bar:before,.bar:after{content:'';height:2px;width:0;bottom:1px;position:absolute;background:#009CD9;transition:.2s ease all}.bar:before{left:50%}.bar:after{right:50%}.datainput input:focus~.bar:before,.datainput input:focus~.bar:after,.datainput textarea:focus~.bar:before,.datainput textarea:focus~.bar:after{width:50%}.indigox{background:#3f51b5}.orangex{background:#ff9800}.pinkx{background:#e91e63}.bluex{background:#2196F3}.purplex{background:#9c27b0}.redx{background:#F44336}.greenx{background:#4CAF50}.highlight{position:absolute;height:50%;width:100px;top:25%;left:0;pointer-events:none;opacity:.5}.datainput input:focus~.highlight,.datainput textarea:focus~.highlight{animation:inputHighlighter .3s ease}.datainput input:focus~label,.datainput input:valid~label,.datainput textarea:focus~label,.datainput textarea:valid~label{top:-10px;font-size:13px;color:#009CD9}

/* Default Whatsapp Form CSS by www.idblanter.com */
form.whatsapp-form {
    box-shadow: 0 1px 6px rgba(32,33,36,.28);
    border-radius: .5rem;
    padding: 20px;
    box-sizing: border-box;
    color: #444;
    font-size: 14px;
    line-height: 1.5;
}
 .whatsapp-form a.send_form {
    color: #fff;
    background: #009CD9;
    text-decoration: none;
    display: inline-block;
    padding: 10px 25px;
    border-radius: .3rem;
    font-weight: 700;
    letter-spacing: .5px;
    font-size: 15px;
}
#text-info span {
    display: block;
    padding: 10px 15px;
    text-align: center;
    font-weight: 700;
    margin: 15px 0;
    border-radius: .5rem;
}
#text-info span.yes {
    background: #009CD9;
    color: #fff;
}
#text-info span.no {
    background: #ffc5c5;
    color: #ce0404;
}
.whatsapp-form{
  width:100%;
  max-width:700px;
  margin:0 auto;
  box-sizing:border-box;
}
</style>
<br>
<a>
    <img src="{{asset('image/icon/wa.svg')}}" alt="" srcset=""><br>
</a>

<div class="container contact-form">
    <form method="post">
        <br>
       <div class="row">
           <div class="col-md-2">

           </div>
            <div class="col-md-8">
                <form class="whatsapp-form">
                    <div class="datainput">
                        <input class="validate" id="wa_name" name="name" required="" type="text" value=''/>
                        <span class="highlight"></span><span class="bar"></span>
                        <label>Nama :</label>
                    </div>
                    <div class="datainput">
                        <textarea id='wa_alamat' placeholder=''  required=""></textarea>
                        <span class="highlight"></span><span class="bar"></span>
                        <label>Alamat Lengkap :</label>
                    </div>
                    <div class="datainput">
                        <textarea id='wa_textarea' placeholder=''  required=""></textarea>
                        <span class="highlight"></span><span class="bar"></span>
                        <label>Keluhan yang dialami atau pertanyaan:</label>
                    </div>
                    <a class="send_form" href="javascript:void" type="submit" title="Send to Whatsapp"><button type="button" class="btn btn-outline-primary">Kirim Pesan</button></a>
                    <div id="text-info"></div>
                    <br>
                </form>
            </div>
        </div>
    </form>
</div>
<script>
$(document).on('click','.send_form', function(){
var input_blanter = document.getElementById('wa_name');

/* Whatsapp Settings */
var walink = 'https://api.whatsapp.com/send',
    phone = '62'+ {{$perawat_aktif->nomor_perawat}},
    text_yes = 'Terkirim.',
    text_no = 'Isi Semua Formulir, Lalu Klik Kirim Pesan';

/* Smartphone Support */
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
var walink = 'whatsapp://send';
}

if("" != input_blanter.value){

 /* Call Input Form */
var input_select1 = $("#wa_select :selected").text(),
    input_name1 = $("#wa_name").val(),
    input_alamat1 = $("#wa_alamat").val(),
    input_textarea1 = $("#wa_textarea").val();

/* Final Whatsapp URL */
var blanter_whatsapp = walink + '?phone=' + phone + '&text=' + 'Assalamualaikum wr wb ' + '%0A' +
    'Haloo saya : ' +'*' + input_name1 +'*'  + '%0A' +
    'Alamat rumah saya di : ' + '*' + input_alamat1 + '*' + '%0A' +
    'Mau bertanya tentang keluhan saya yaitu : ' +'*'+ input_textarea1 + '*'+ '%0A';

/* Whatsapp Window Open */
window.open(blanter_whatsapp,'_blank');
document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>';
} else {
document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>';
}
});
</script>
@endsection