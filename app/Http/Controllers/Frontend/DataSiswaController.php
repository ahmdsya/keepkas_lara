<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DataSiswaController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$title = 'Data Siswa';
    	$getKelas = auth()->user()->kelas;
    	$datasiswa = User::where('kelas', $getKelas)->paginate(6);
        $active = $request->segment(1);

    	return view('frontend.datasiswa.datasiswa', compact('title', 'datasiswa', 'active'));

    }
}
