<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('beratbadan');
    }
    public function gizi()
    {
        return view('cek-gizi');
    }
    public function kalkulator()
    {
        return view('kalkulator');
    }
    public function tekanan()
    {
        return view('comingsoon');
    }
    public function oksigen()
    {
        return view('comingsoon');
    }
}
