<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kelas;

class UserController extends Controller
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
        $title = 'Data Siswa';
        $kelas = Kelas::all();
        $no = 1;

       if (auth()->user()->level == 'Admin') {
            $siswa = User::all();
        }elseif (auth()->user()->level == 'Wali Kelas') {
            $siswa = User::where('kelas', auth()->user()->kelas)->get();
        }elseif (auth()->user()->level == 'Bendahara') {
            $siswa = User::where('kelas', auth()->user()->kelas)->get();
        }
        return view('backend.siswa.siswa', compact('title', 'siswa', 'no', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Siswa';
        $kelas = Kelas::all();
        return view('backend.siswa.tambah', compact('title', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->username);
        $user->username = $request->username;
        $user->kelas = $request->kelas;
        $user->remember_token = str_random(60);
        $user->save();

        return redirect()->back()->with('sukses', 'Berhasil');
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
        $siswa = User::where('kelas', $kls)->get();

        return view('backend.siswa.siswaAdmin', 
            compact('title', 'no', 'siswa', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Ubah Data Siswa';
        $siswa = User::find($id);
        $kelas = Kelas::all();

        return view('backend.siswa.ubah', compact('title', 'siswa', 'kelas'));
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
        $siswa = User::find($id);
        $siswa->update($request->all());
        return redirect()->back()->with('sukses', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = User::find($id);
        $siswa->delete();

        return redirect()->back()->with('sukses', 'Berhasil');
    }
}
