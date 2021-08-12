@extends('layouts.app')
@section('title')
    Konsultasi Kesehatan
@endsection
@section('content')
<style>
    .hide-element {
        visibility: hidden;
    }
</style>
<script>
    
</script>

<div class="card-body">
    <h4 class="text-left font-weight-bold sipenpin-subtitle" style="margin-top: -10px; margin-left: -10px">Hubungi</h4>
    <br>
    <body onload="startTime()">
        <div id="txt" style="font-size: 120%"></div>
    </body>
    <br>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tenaga Konsultasi</th>
                <th scope="col">Jam Operasional</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Bidan</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s', $bidan_aktif->jam_awal)->format('H:i')}} - {{\Carbon\Carbon::createFromFormat('H:i:s', $bidan_aktif->jam_akhir)->format('H:i')}}
                    WIB</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Perawat</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s', $perawat_aktif->jam_awal)->format('H:i')}} - {{\Carbon\Carbon::createFromFormat('H:i:s', $perawat_aktif->jam_akhir)->format('H:i')}} WIB</td>

              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Kader Kesehatan</td>
                <td>{{\Carbon\Carbon::createFromFormat('H:i:s', $kader_aktif->jam_awal)->format('H:i')}} - {{\Carbon\Carbon::createFromFormat('H:i:s', $kader_aktif->jam_akhir)->format('H:i')}} WIB</td>
              </tr>
            </tbody>
          </table>
    </div>
    <br>
    <body>
        
    </body>
    <div class="row">
        <div class="col-6 text-center" >
            <img src="{{asset('image/menu/cal-1.svg')}}" alt="" srcset="" style="width: 100%"><br><br>
            <form action="/calldarurat-1">
                <button type="submit" class="btn btn-primary" id="checktimer-bidan">Konsultasi Sekarang</button>
            </form>
        </div>
        <div class="col-6 text-center" >
            <img src="{{asset('image/menu/cal-2.svg')}}" alt="" srcset="" style="width: 100%"><br><br>
            <form action="/calldarurat-1">
                <button type="submit" class="btn btn-primary"id="checktimer-perawat">Konsultasi Sekarang</button>
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 text-center" >
            <img src="{{asset('image/menu/cal-3.svg')}}" alt="" srcset="" style="width: 100%"><br><br>
            <form action="/calldarurat-3">
                <button type="submit" class="btn btn-primary" id="checktimer-kader">Konsultasi Sekarang</button>
            </form>
        </div>
    </div>
    <br>

        <script type="text/javascript" defer="defer">
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML =
                "Waktu Sekarang: "+  h + ":" + m + ":" + s + " WIB";
                var t = setTimeout(startTime, 1000);
                }
                function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }
            var enableDisable = function(){
                var UTC_hours = new Date().getUTCHours()+7;
                console.log(UTC_hours)

                var buka_bidan = {{\Carbon\Carbon::createFromFormat('H:i:s', $bidan_aktif->jam_awal)->format('H')}};
                var tutup_bidan = {{\Carbon\Carbon::createFromFormat('H:i:s', $bidan_aktif->jam_akhir)->format('H')}};

                var buka_perawat = {{\Carbon\Carbon::createFromFormat('H:i:s', $perawat_aktif->jam_awal)->format('H')}};
                var tutup_perawat = {{\Carbon\Carbon::createFromFormat('H:i:s', $perawat_aktif->jam_akhir)->format('H')}};

                var buka_kader = {{\Carbon\Carbon::createFromFormat('H:i:s', $kader_aktif->jam_awal)->format('H')}};
                var tutup_kader = {{\Carbon\Carbon::createFromFormat('H:i:s', $kader_aktif->jam_akhir)->format('H')}};


                if (UTC_hours >= buka_bidan && UTC_hours < tutup_bidan) {
                    document.getElementById('checktimer-bidan').disabled = false;
                }
                else {
                    document.getElementById('checktimer-bidan').disabled = true;
                }
                if (UTC_hours >= buka_perawat && UTC_hours < tutup_perawat) {
                    document.getElementById('checktimer-perawat').disabled = false;
                }
                else {
                    document.getElementById('checktimer-perawat').disabled = true;
                }
                if (UTC_hours >= buka_kader && UTC_hours < tutup_kader) {
                    document.getElementById('checktimer-kader').disabled = false;
                }
                else {
                    document.getElementById('checktimer-kader').disabled = true;
                }
            };
            setInterval(enableDisable, 1000*60);
            enableDisable();
            // -->
        </script>
</div>
@endsection