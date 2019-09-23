<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasMasuk;

class RincianKasController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$title = 'Rincian Kas';
    	$getNis = auth()->user()->username;
    	$kasmasuk = KasMasuk::where('nis', $getNis)->paginate(5);
        $active = $request->segment(1);

    	return view('frontend.rinciankas.rinciankas', compact('title', 'kasmasuk', 'active'));
    }
}
