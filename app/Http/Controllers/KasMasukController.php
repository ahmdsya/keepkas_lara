<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\KasMasukExport;
use App\Exports\KasMasukExportBetween;
use Maatwebsite\Excel\Facades\Excel;
use App\KasMasuk;
use App\Admin;
use App\Kelas;

class KasMasukController extends Controller
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
        $title = 'Data Kas Masuk';
        $no = 1;
        $kelas = Kelas::all();
        
        if (auth()->user()->level == 'Admin') {
            $kasmasuk = KasMasuk::orderBy('id', 'desc')->get();
        }elseif (auth()->user()->level == 'Wali Kelas') {
            $kasmasuk = KasMasuk::where('kelas', auth()->user()->kelas)->orderBy('id', 'desc')->get();
        }elseif (auth()->user()->level == 'Bendahara') {
            $kasmasuk = KasMasuk::where('kelas', auth()->user()->kelas)->orderBy('id', 'desc')->get();
        }

        return view('backend.kasmasuk.kasMasuk', compact('title', 'kasmasuk', 'no', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kls)
    {
        $title = 'Data Kas Masuk';
        $kelas = Kelas::all();
        $no = 1;
        $kasmasuk = KasMasuk::where('kelas', $kls)->get();

        return view('backend.kasmasuk.kasMasukAdmin', 
            compact('title', 'no', 'kasmasuk', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasMasuk = KasMasuk::find($id);
        $kasMasuk->delete();

        return redirect()->back()->with('sukses', 'Berhasil.');
    }

    public function exportKasMasuk($value)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d-m-Y');
        if ($value == 7) {
            return (new KasMasukExport($value))->download('kas-masuk-7-hari('.$date.').xlsx');
        }elseif ($value == 30) {
            return (new KasMasukExport($value))->download('kas-masuk-30-hari('.$date.').xlsx');
        }
        return (new KasMasukExport($value))->download('kas-masuk(bulan '.$value.').xlsx');
    }

    public function exportBetween(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $from = $request->from;
        $to = $request->to;
        return (new KasMasukExportBetween($from, $to))->download('kas-masuk('.$from.' s_d '.$to.').xlsx');
    }
}
