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
}
