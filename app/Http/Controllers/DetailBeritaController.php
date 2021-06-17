<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class DetailBeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $berita = Berita::find($id);
        // dd($berita);
        return view('detailberita', compact('berita'));
    }
}
