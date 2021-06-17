<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterPekerjaan;
use App\Models\MasterStatusHubungan;
use App\Models\MasterDusun;
use App\Models\MasterWhatsapp;


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
    public function indexWhatsapp()
    {
        $listWhatsapp = MasterWhatsapp::all();
        return view('admin.superadmin.master-whatsapp', ['listWhatsapp' => $listWhatsapp])->with('onSide', 'whatsapp');
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
    public function dropWhatsappTable(MasterWhatsapp $master)
    {
        try {
            MasterWhatsapp::destroy('id', $master->id);
            return redirect('/back-master/whatsapp')->with('success', 'Berhasil Menghapus Dusun');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
    }
}
