<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Superadmin']);
    }

    public function index()
    {
        $listUserUser = User::role('User')->get();
        $listUserKesehatan = User::role('Admin Kesehatan')->get();
        $listUserKader = User::role('Admin Kader')->get();

        return view('admin.superadmin.user', ['listUserUser' => $listUserUser, 'listUserKesehatan' => $listUserKesehatan, 'listUserKader' => $listUserKader])->with('onSide', 'user');
    }

    public function save(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|min:6|unique:users',
            'new_password' => 'Required_with:confirm_password|same:confirm_password|min:8',
            'confirm_password' => 'min:8',
            'roled' => 'required'
        ]);

        /* try { */
            $user = new User();
            $user->name = $request->full_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token = \Str::random(60);
            $user->save();

            if($request->roled == 2){
                $user->assignRole('Admin Kesehatan');
            } else if($request->roled == 3){
                $user->assignRole('Admin Kader');
            } else if($request->roled == 4){
                $user->assignRole('User');
            } else {
                echo "failed";
            }

            return redirect('/back-user')->with('success', 'Berhasil Menambahkan Akun Baru');
        /* } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        } */
    }

    public function reset(User $user)
    {
        try {
            User::where('id', $user->id)->update([
                'password' => bcrypt('@Sipenpin-sehat2021')
            ]);
            return redirect('/back-user')->with('success', 'Berhasil Reset Password');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
        
    }

    public function drop(User $user)
    {
        try {
            User::destroy('id', $user->id);
            return redirect('/back-user')->with('success', 'Berhasil Menghapus Akun');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'Terjadi Kesalahan '.$th);
        }
        
    }
}
