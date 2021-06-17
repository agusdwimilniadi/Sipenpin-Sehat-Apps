<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class AdminPerpustakaanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Superadmin']);
    }

    public function index()
    {
        $listPerpustakaan = Perpustakaan::all();
        return view('admin.superadmin.perpustakaan', ['listPerpustakaan' => $listPerpustakaan])->with('onSide', 'perpustakaan');
    }

    public function save(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'deskripsi_singkat' => 'required',
            'file_buku' => 'required|mimetypes:application/pdf'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        try {

            $newPerpustakaan = new Perpustakaan();
            $newPerpustakaan->judul = $request->judul_buku;
            $newPerpustakaan->deskripsi_singkat = $request->deskripsi_singkat;
            
            if ($request->file('file_buku')) {
                $request->file('file_buku')->move('upload/perpustakaan', $date.$random.$request->file('file_buku')->getClientOriginalName());
                $newPerpustakaan->file_buku = $date.$random.$request->file('file_buku')->getClientOriginalName();
            }
            
            $newPerpustakaan->save();
            return redirect('/back-perpustakaan')->with('success', 'Berhasil Menambahkan Buku Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function edit(Perpustakaan $perpustakaan)
    {
        return view('admin.superadmin.perpustakaan-edit', ['dataPerpustakaan' => $perpustakaan])->with('onSide', 'perpustakaan');
    }

    public function update(Perpustakaan $perpustakaan, Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'deskripsi_singkat' => 'required',
            'file_buku' => 'mimetypes:application/pdf'
        ]);

        $date = date('H-i-s');
        $random = \Str::random(5);

        try {

            $newPerpustakaan = Perpustakaan::find($perpustakaan->id);
            $newPerpustakaan->judul = $request->judul_buku;
            $newPerpustakaan->deskripsi_singkat = $request->deskripsi_singkat;
            
            if ($request->file('file_buku')) {
                $request->file('file_buku')->move('upload/perpustakaan', $date.$random.$request->file('file_buku')->getClientOriginalName());
                $newPerpustakaan->file_buku = $date.$random.$request->file('file_buku')->getClientOriginalName();
            }

            $newPerpustakaan->save();
            return redirect('/back-perpustakaan')->with('success', 'Berhasil Memperbarui Buku');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function drop(Perpustakaan $perpustakaan)
    {
        try {
            Perpustakaan::destroy('id', $perpustakaan->id);
            return redirect('/back-perpustakaan')->with('success', 'Berhasil Menghapus Data Buku');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
        
    }
}
