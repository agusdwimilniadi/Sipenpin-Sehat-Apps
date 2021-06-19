<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallDaruratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $getNomorKaderActive = \DB::table('nomor_darurat_kader')->where('is_active', 1)->first();
        $getNomorKadesActive = \DB::table('nomor_darurat_kades')->where('is_active', 1)->first();
        return view('callbutton', ['nomor_kader_aktif' => $getNomorKaderActive, 'nomor_kades_aktif' => $getNomorKadesActive]);
    }
    public function bidan()
    {
        $getBidanActive = \DB::table('wa_bidan')->where('is_active', 1)->first();
        return view('calldarurat-1', ['bidan_aktif' => $getBidanActive]);
    }
    public function perawat()
    {
        $getPerawatActive = \DB::table('wa_perawat')->where('is_perawat', 1)->first();
        return view('calldarurat-2', ['perawat_aktif' => $getPerawatActive]);
    }
    public function kader()
    {
        $getKaderActive = \DB::table('wa_kader')->where('is_active', 1)->first();
        return view('calldarurat-3', ['kader_aktif' => $getKaderActive]);
    }
    public function pemudadesa()
    {
        return view('calldarurat-4');
    }
}
