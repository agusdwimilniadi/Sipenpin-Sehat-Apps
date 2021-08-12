<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Superadmin|Admin Kesehatan|Admin Kader']);
    }

    public function index(){
        // if(Auth::user()->hasRole('Superadmin')){
        //     return view('admin.superadmin.dashboard')->with('onSide', 'dashboard');
        // } elseif(Auth::user()->hasRole('Admin Kesehatan')){
        //     echo "Admin Kesehatan";
        // } elseif(Auth::user()->hasRole('Admin Kader')){
        //     echo "Admin Kader";
        // }
        return view('admin.superadmin.dashboard')->with('onSide', 'dashboard');
    }
    public function livechat()
    {
        return view('admin.superadmin.livechat')->with('onSide', 'livechat');

    }
}
