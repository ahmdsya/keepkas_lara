<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KasMasuk;
use App\User;
class BayarKasController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$title = 'Bayar Kas';
        $active = $request->segment(1);

    	return view('frontend.bayarkas.bayarkas', compact('title', 'active'));
    }

    public function bayarKas(Request $request)
    {

    	date_default_timezone_set('Asia/Jakarta');
    	$date = date('Y-m-d H:i:s');

    	$username = auth()->user()->username;
    	$name = auth()->user()->name;
    	$email = auth()->user()->email;
    	$kelas = auth()->user()->kelas;

    	$kasmasuk = new KasMasuk;
    	$kasmasuk->nis = $username;
    	$kasmasuk->nama = $name;
    	$kasmasuk->kelas = $kelas;
    	$kasmasuk->waktu = $date;
    	$kasmasuk->status = 'Pending';
    	$kasmasuk->jumlah = $request->jumlah;
    	$kasmasuk->save();

    	if ($kasmasuk) {

    		return redirect()->route('bayar.kas')->with('sukses', 'Berhasil membayar kas. Selanjutnya bendahara akan mengkonfirmasi pembayaran kas Anda.');
    	}

    	return redirect()->route('bayar.kas');
    }
}
