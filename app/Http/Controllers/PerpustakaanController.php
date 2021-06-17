<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $perpustakaans = Perpustakaan::latest()->get();
        return view('perpustakaan', compact('perpustakaans'));
    }
}
