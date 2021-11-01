<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Home';
        $getKelas = auth()->user()->kelas;
        $users = User::where('kelas', $getKelas)->limit(8)->get();

        return view('frontend.home.home', compact('title', 'users'));
    }
}
