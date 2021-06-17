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
        return view('callbutton');
    }
    public function bidan()
    {
        return view('calldarurat-1');
    }
    public function perawat()
    {
        return view('calldarurat-2');
    }
    public function kader()
    {
        return view('calldarurat-3');
    }
    public function pemudadesa()
    {
        return view('calldarurat-4');
    }
}
