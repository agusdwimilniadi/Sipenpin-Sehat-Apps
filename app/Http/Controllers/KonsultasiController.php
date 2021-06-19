<?php

namespace App\Http\Controllers;
use App\Models\MasterBidan;
use App\Models\MasterKader;
use App\Models\MasterPerawat;

use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        try {
            $getBidanActive = \DB::table('wa_bidan')->where('is_active', 1)->first();
            $getPerawatActive = \DB::table('wa_perawat')->where('is_perawat', 1)->first();
            $getKaderActive = \DB::table('wa_kader')->where('is_active', 1)->first();
            if ($getBidanActive != NULL && $getKaderActive != NULL && $getPerawatActive != NULL)
            {
               return view('konsultasi', ['bidan_aktif' => $getBidanActive, 'perawat_aktif' => $getPerawatActive, 'kader_aktif' => $getKaderActive]);
            } else {
                return view('error');
            }
        }
        catch (\Throwable $th) {
            return view('error');
        }
    }
}
