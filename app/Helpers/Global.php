<?php

use App\KasMasuk;
use App\KasKeluar;
use App\User;

function showImg($id)
{
	$siswa = User::find($id);
	if ( empty($siswa->foto)) {
		$img = 'avatar-2.png';
	}else{
		$img = $siswa->foto;
	}

	return $img;
}

function totalSiswaKelas($kls)
{
	$totalSiswa = User::where('kelas', $kls)->count();

	return $totalSiswa;
}

function totalKasMasukKelas($kls)
{
	$getTotal = KasMasuk::where(['kelas' => $kls, 'status' => 'Terkonfirmasi'])->sum('jumlah');

	return $getTotal;
}

function totalKasKeluarKelas($kls)
{
	$getTotal = KasKeluar::where('kelas', $kls)->sum('jumlah');

	return $getTotal;
}

function totalSaldoKelas($kls)
{
	$getSaldo = totalKasMasukKelas($kls) - totalKasKeluarKelas($kls);

	return $getSaldo;
}

function kaliBayar($nis)
{
	$kaliBayar = KasMasuk::where(['nis' => $nis, 'status' => 'Terkonfirmasi'])->count();

	return $kaliBayar;
}

function notif($kls)
{
	$count = KasMasuk::where(['kelas' => $kls, 'status' => 'Pending'])->count();

	return $count;
}

function footerLeft()
{
	echo '
		<div class="footer-left">
			Copyright &copy; '.date('Y').' <div class="bullet"></div> <b>KeepKas - Aplikasi Uang Kas Kelas</b>
		</div>
	';
}

function bulan()
{
	if (date('m') == '01') {
		$bulan = 'Januari';
	}elseif (date('m') == '02') {
		$bulan = 'Februari';
	}elseif (date('m') == '03') {
		$bulan = 'Maret';
	}elseif (date('m') == '04') {
		$bulan = 'April';
	}elseif (date('m') == '05') {
		$bulan = 'Mei';
	}elseif (date('m') == '06') {
		$bulan = 'Juni';
	}elseif (date('m') == '07') {
		$bulan = 'Juli';
	}elseif (date('m') == '08') {
		$bulan = 'Agustus';
	}elseif (date('m') == '09') {
		$bulan = 'September';
	}elseif (date('m') == '10') {
		$bulan = 'Oktober';
	}elseif (date('m') == '11') {
		$bulan = 'November';
	}elseif (date('m') == '12') {
		$bulan = 'Desember';
	}

	return $bulan;
}

function footerRight()
{
	echo '
		<div class="footer-right">
			Created By '.created().
		'</div>';
}

function created()
{
	$created = '<b>Ahmad Syarif</b>';
	return $created;
}