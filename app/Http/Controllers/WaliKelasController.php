<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WaliKelas;
use App\Kelas;
use App\Admin;

class WaliKelasController extends Controller
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
        $title = 'Data Wali Kelas';
        $no = 1;
        $wali = WaliKelas::all();
        $kelas = Kelas::all();

        return view('backend.walikelas.waliKelas', compact('title', 'wali', 'no', 'kelas'));
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
        $admin = new \App\Admin;
        $admin->name = $request->nama;
        $admin->email = $request->email;
        $admin->level = 'Wali Kelas';
        $admin->kelas = $request->kelas;
        $admin->password = bcrypt($request->password);
        $admin->remember_token = str_random(60);
        $admin->save();

        $request->request->add(['admin_id' => $admin->id]);
        WaliKelas::create($request->all());

        return redirect()->back()->with('Sukses', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wali = WaliKelas::find($id);
        $admin = Admin::find($wali->admin_id);
        if($wali->delete()){
            $admin->delete();
        }

        return redirect()->back()->with('sukses', 'Berhasil');
    }
}
