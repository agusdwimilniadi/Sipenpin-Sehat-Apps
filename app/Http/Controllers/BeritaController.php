<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $beritas = Berita::latest()->get();
        $beritas = Berita::latest()->paginate(3);
        return view('berita', compact('beritas'));
    }
}
