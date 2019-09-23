<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KasKeluar;
use App\Kelas;

class KasKeluarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Kas Keluar';
        $no = 1;
        $kelas = Kelas::all();
        
        if (auth()->user()->level == 'Admin') {
            $kaskeluar = KasKeluar::orderBy('id', 'desc')->get();
        }elseif (auth()->user()->level == 'Wali Kelas') {
            $kaskeluar = KasKeluar::where('kelas', auth()->user()->kelas)->orderBy('id', 'desc')->get();
        }elseif (auth()->user()->level == 'Bendahara') {
            $kaskeluar = KasKeluar::where('kelas', auth()->user()->kelas)->orderBy('id', 'desc')->get();
        }

        return view('backend.kaskeluar.kasKeluar', compact('title', 'kaskeluar', 'no', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Kas Keluar';

        return view('backend.kaskeluar.tambah', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $kasKeluar = new KasKeluar;
        $kasKeluar->keterangan = $request->keterangan;
        $kasKeluar->kelas = auth()->user()->kelas;
        $kasKeluar->tanggal = $request->tanggal;
        $kasKeluar->jumlah =$request->jumlah;
        $kasKeluar->save();

        return redirect()->back()->with('sukses', 'Berhasil.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kls)
    {
        $title = 'Data Kas Keluar';
        $kelas = Kelas::all();
        $no = 1;
        $kaskeluar = KasKeluar::where('kelas', $kls)->get();

        return view('backend.kaskeluar.kasKeluarAdmin', 
            compact('title', 'no', 'kaskeluar', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Ubah Kas Keluar';
        $kaskeluar = KasKeluar::find($id);

        return view('backend.kaskeluar.ubah', compact('title', 'kaskeluar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kaskeluar = KasKeluar::find($id);
        $kaskeluar->update($request->all());

        return redirect()->back()->with('sukses', 'Berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasKeluar = KasKeluar::find($id);
        $kasKeluar->delete();

        return redirect()->back()->with('sukses', 'Berhasil.');
    }
}
