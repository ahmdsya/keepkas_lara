<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasMasuk;

class KasMasukController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$title = 'Data Kas Masuk';
    	$no = 1;
    	$getKelas = auth()->user()->kelas;
    	$kasmasuk = KasMasuk::where(['kelas' => $getKelas, 'status' => 'Terkonfirmasi'])->get();

    	return view('frontend.kasmasuk.kasmasuk', compact('title', 'no', 'kasmasuk'));
    }
}
