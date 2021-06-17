<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BackLogController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(!Auth::attempt(['email' => $request['email'],'password' => $request['password']]))
        {
            return redirect()->back()->with('message-wrong', 'true');
        }
        return redirect('/back-dashboard');
    }
}
