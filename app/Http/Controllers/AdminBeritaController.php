<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class AdminBeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Superadmin|Admin Kader']);
    }

    public function index()
    {
        $listBerita = Berita::all();
        return view('admin.superadmin.berita', ['listBerita' => $listBerita])->with('onSide', 'berita');
    }

    public function save(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required',
            'deskripsi_berita' => 'required',
            'gambar_berita' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        try {

            $newBerita = new Berita();
            $newBerita->judul = $request->judul_berita;
            $newBerita->deskripsi = $request->deskripsi_berita;
            
            if ($request->file('gambar_berita')) {
                $request->file('gambar_berita')->move('upload/berita', $date.$random.$request->file('gambar_berita')->getClientOriginalName());
                $newBerita->gambar = $date.$random.$request->file('gambar_berita')->getClientOriginalName();
            } else {
                $newBerita->gambar = 'default_berita.jpg';
            }

            $newBerita->save();
            return redirect('/back-berita')->with('success', 'Berhasil Menambahkan Berita Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
    
    public function edit(Berita $berita)
    {
        return view('admin.superadmin.berita-edit', ['dataBerita' => $berita])->with('onSide', 'berita');
    }

    public function update(Berita $berita, Request $request)
    {
        $request->validate([
            'judul_berita' => 'required',
            'deskripsi_berita' => 'required',
            'gambar_berita' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        try {

            $newBerita = Berita::find($berita->id);
            $newBerita->judul = $request->judul_berita;
            $newBerita->deskripsi = $request->deskripsi_berita;
            
            if ($request->file('gambar_berita')) {
                $request->file('gambar_berita')->move('upload/berita', $date.$random.$request->file('gambar_berita')->getClientOriginalName());
                $newBerita->gambar = $date.$random.$request->file('gambar_berita')->getClientOriginalName();
            }

            $newBerita->save();
            return redirect('/back-berita')->with('success', 'Berhasil Memperbarui Berita Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function drop(Berita $berita)
    {
        try {
            Berita::destroy('id', $berita->id);
            return redirect('/back-berita')->with('success', 'Berhasil Menghapus Berita Baru');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
        
    }
}
