<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        if (\Auth::user()) {
            return redirect()->route('events.index');
        }
        return view('index');
    }

    public function logon(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password_hash' => ['required']
        ]);
        $attempt = [
            'email' => $request->get('email'),
            'password' => $request->get('password_hash'),
        ];
        if (\Auth::attempt($attempt)) {
            return redirect()->route('events.index');
        }
        return redirect()->back()->with('info', 'Email or password not correct');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }
}
