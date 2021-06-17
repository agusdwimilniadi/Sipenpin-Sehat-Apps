@extends('layouts.app')
@section('title')
    Pendataan Kesehatan
@endsection

@section('content')
<style>

    .contact-form{
        background: #fff;
        margin-top: 10%;
        margin-bottom: 5%;
        width: 100%;
    }
    .contact-form .form-control{
        border-radius:1rem;
    }
    .contact-image{
        text-align: center;
    }
    .contact-image img{
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        transform: rotate(29deg);
    }
    .contact-form form{
        padding: 5%;
    }
    .contact-form form .row{
        margin-bottom: -7%;
    }
    .contact-form h3{
        margin-bottom: 8%;
        margin-top: -10%;
        text-align: center;
        color: #0062cc;
    }
    .contact-form .btnContact {
        width: 50%;
        border: none;
        border-radius: 1rem;
        padding: 1.5%;
        background: #dc3545;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
    }
    .btnContactSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        color: #fff;
        background-color: #0062cc;
        border: none;
        cursor: pointer;
    }
    /* STYLE 2 */

</style>

<div class="container contact-form">
    <form method="post">
        <h3>Identitas Diri</h3>
       <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <h5 style="text-align: left; margin-left: 2%; color: #009CD9;">NIK</h5>
                    <input type="number" name="txtName" class="form-control"  value="" />
                </div>
                <div class="form-group">
                    <h5 style="text-align: left; margin-left: 2%; color: #009CD9;">Nama</h5>
                    <input type="text" name="txtEmail" class="form-control"  value="" />
                </div>
                <div class="form-group">
                    <h5 style="text-align: left; margin-left: 2%; color: #009CD9;">Tanggal Lahir</h5>
                    <input type="date" name="txtEmail" class="form-control" value="" />
                </div>
                <div class="form-group">
                    <h5 style="text-align: left; margin-left: 2%; color: #009CD9;">Status Hubungan Keluarga</h5>
                    <input type="text" name="txtEmail" placeholder="L/P *" class="form-control"  value="" />
                </div>
                <div class="form-group">
                    <h5 style="text-align: left; margin-left: 2%; color: #009CD9;">Alamat</h5>
                    <input type="text" name="txtEmail" placeholder="L/P *" class="form-control"  value="" />
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="Simpan dan Lanjutkan" />
                </div>
            </div>
        </div>
    </form>
</div>
@endsection