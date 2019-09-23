<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KasMasuk;
use App\User;

class KonfirmasiController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function konfirmasi($idKasMasuk)
    {
    	date_default_timezone_set('Asia/Jakarta');

    	$status = KasMasuk::find($idKasMasuk);
    	$username = $status->nis;
    	$kelas = $status->kelas;
    	$status->update([
    		'status' => 'Terkonfirmasi'
    	]);

    	if ($status) {
    		$getJumlah = KasMasuk::where(['nis' => $username, 'kelas' => $kelas, 'status' => 'Terkonfirmasi'])->sum('jumlah');

    		$getUser = User::where(['username' => $username, 'kelas' => $kelas]);
    		$getUser->update([
    			'jumlah' => $getJumlah,
    			'tanggal' => date('Y-m-d')
    		]);

    		return redirect()->route('kas-masuk.index')->with('sukses', 'Berhasil di konfirmasi');
    	}

    	return redirect()->route('kas-masuk.index')->with('gagal', 'Gagal di konfirmasi');
    }
}
