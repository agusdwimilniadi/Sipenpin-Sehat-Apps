<?php

namespace App\Http\Controllers;

use App\Models\MasterBidan;
use App\Models\MasterPerawat;
use App\Models\MasterKader;
use Illuminate\Http\Request;
use App\Models\MasterPekerjaan;
use App\Models\MasterStatusHubungan;
use App\Models\MasterDusun;



class AdminMasterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Superadmin']);
    }

    public function indexPekerjaan()
    {
        $listPekerjaan = MasterPekerjaan::all();
        return view('admin.superadmin.master-pekerjaan', ['listPekerjaan' => $listPekerjaan])->with('onSide', 'pekerjaan');
    }

    public function indexStatusHubungan()
    {
        $listStatusHubungan = MasterStatusHubungan::all();
        return view('admin.superadmin.master-status-hubungan', ['listStatusHubungan' => $listStatusHubungan])->with('onSide', 'statusHubungan');
    }
    public function indexDusun()
    {
        $listDusun = MasterDusun::all();
        return view('admin.superadmin.master-dusun', ['listDusun' => $listDusun])->with('onSide', 'dusun');
    }
    public function indexBidan()
    {
        $listBidan = MasterBidan::all();
        return view('admin.superadmin.master-bidan', ['listBidan' => $listBidan])->with('onSide', 'bidan');
    }
    public function indexPerawat()
    {
        $listPerawat = MasterPerawat::all();
        return view('admin.superadmin.master-perawat', ['listPerawat' => $listPerawat])->with('onSide', 'perawat');
    }
    public function indexKader()
    {
        $listKader = MasterKader::all();
        return view('admin.superadmin.master-kader', ['listKader' => $listKader])->with('onSide', 'kader');
    }


    public function savePekerjaan(Request $request)
    {
        $request->validate([
            'nama_pekerjaan' => 'required',
        ]);

        try {

            $newMasterPekerjaan = new MasterPekerjaan();
            $newMasterPekerjaan->nama_pekerjaan = $request->nama_pekerjaan;
            $newMasterPekerjaan->save();
            return redirect('/back-master/pekerjaan')->with('success', 'Berhasil Menambahkan Pekerjaan Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function saveStatusHubungan(Request $request)
    {
        $request->validate([
            'nama_hubungan' => 'required',
        ]);

        try {

            $newMasterHubungan = new MasterStatusHubungan();
            $newMasterHubungan->nama_hubungan = $request->nama_hubungan;
            $newMasterHubungan->save();
            return redirect('/back-master/status-hubungan')->with('success', 'Berhasil Menambahkan Status Hubungan Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function saveDusun(Request $request)
    {
        $request->validate([
            'nama_dusun' => 'required',
        ]);

        try {

            $newMasterDusun = new MasterDusun();
            $newMasterDusun->nama_dusun = $request->nama_dusun;
            $newMasterDusun->save();
            return redirect('/back-master/dusun')->with('success', 'Berhasil Menambahkan Dusun Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
    public function saveBidan(Request $request)
    {
        $request->validate([
            'nama_bidan' => 'required',
            'nomor_bidan' => 'required',
        ]);

        try {

            $newMasterBidan = new MasterBidan();
            $newMasterBidan->nama_bidan = $request->nama_bidan;
            $newMasterBidan->nomor_bidan = $request->nomor_bidan;
            $newMasterBidan->is_active = 0; 
            $newMasterBidan->save();
            return redirect('/back-master/bidan')->with('success', 'Berhasil Menambahkan Bidan Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi  Kesalahan '.$th);
        }
    }
    public function savePerawat(Request $request)
    {
        $request->validate([
            'nama_perawat' => 'required',
            'nomor_perawat' => 'required',
        ]);

        try {

            $newMasterPerawat = new MasterPerawat();
            $newMasterPerawat->nama_perawat = $request->nama_perawat;
            $newMasterPerawat->nomor_perawat = $request->nomor_perawat;
            $newMasterPerawat->is_perawat = 0; 
            $newMasterPerawat->save();
            return redirect('/back-master/perawat')->with('success', 'Berhasil Menambahkan Perawat Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi  Kesalahan '.$th);
        }
    }
    public function saveKader(Request $request)
    {
        $request->validate([
            'nama_kader' => 'required',
            'nomor_kader' => 'required',
        ]);

        try {

            $newMasterKader = new MasterKader();
            $newMasterKader->nama_kader = $request->nama_kader;
            $newMasterKader->nomor_kader = $request->nomor_kader;
            $newMasterKader->is_active = 0; 
            $newMasterKader->save();
            return redirect('/back-master/kader')->with('success', 'Berhasil Menambahkan Kader Baru');

        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi  Kesalahan '.$th);
        }
    }

    public function dropPekerjaan(MasterPekerjaan $master)
    {
        try {
            MasterPekerjaan::destroy('id', $master->id);
            return redirect('/back-master/pekerjaan')->with('success', 'Berhasil Menghapus Jenis Pekerjaan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function dropStatusHubungan(MasterStatusHubungan $master)
    {
        try {
            MasterStatusHubungan::destroy('id', $master->id);
            return redirect('/back-master/status-hubungan')->with('success', 'Berhasil Menghapus Status Hubungan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function dropDusun(MasterDusun $master)
    {
        try {
            MasterDusun::destroy('id', $master->id);
            return redirect('/back-master/dusun')->with('success', 'Berhasil Menghapus Dusun');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
    public function dropBidan(MasterBidan $master)
    {
        try {
            MasterBidan::destroy('id', $master->id);
            return redirect('/back-master/bidan')->with('success', 'Berhasil Menghapus Bidan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }

    public function dropPerawat(MasterPerawat $master)
    {
        try {
            MasterPerawat::destroy('id', $master->id);
            return redirect('/back-master/perawat')->with('success', 'Berhasil Menghapus Perawat');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
    public function dropKader(MasterKader $master)
    {
        try {
            MasterKader::destroy('id', $master->id);
            return redirect('/back-master/kader')->with('success', 'Berhasil Menghapus Kader');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }


    public function bidanActive(MasterBidan $master)
    {
        try {
            MasterBidan::where('is_active', 1)->update([
                'is_active' => 0,
            ]);
            MasterBidan::where('id', $master->id)->update([
                'is_active' => 1,
            ]);
            return redirect('/back-master/bidan')->with('success', 'Berhasil Mengaktifkan Bidan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
    public function perawatActive(MasterPerawat $master)
    {
        try {
            MasterPerawat::where('is_perawat', 1)->update([
                'is_perawat' => 0,
            ]);
            MasterPerawat::where('id', $master->id)->update([
                'is_perawat' => 1,
            ]);
            return redirect('/back-master/perawat')->with('success', 'Berhasil Mengaktifkan Perawat');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
    public function kaderActive(MasterKader $master)
    {
        try {
            MasterKader::where('is_active', 1)->update([
                'is_active' => 0,
            ]);
            MasterKader::where('id', $master->id)->update([
                'is_active' => 1,
            ]);
            return redirect('/back-master/kader')->with('success', 'Berhasil Mengaktifkan Perawat');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
}
