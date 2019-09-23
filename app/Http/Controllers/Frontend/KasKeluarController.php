<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasKeluar;

class KasKeluarController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$title = 'Data Kas Keluar';
    	$no = 1;
    	$getKelas = auth()->user()->kelas;
    	$kaskeluar = KasKeluar::where('kelas', $getKelas)->get();

    	return view('frontend.kaskeluar.kaskeluar', compact('title', 'no', 'kaskeluar'));
    }
}
