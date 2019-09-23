<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\KasMasuk;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';

        $getData = KasMasuk::whereMonth('waktu', date('m'))->where([
            ['kelas', Auth::user()->kelas],
            ['status', 'Terkonfirmasi']
        ])->get();
        $dateKasMasuk = [];
        $kasMasuk = [];
        foreach ($getData as $km) {
            $dateKasMasuk[] = date("M d",strtotime($km->waktu));
            $kasMasuk[] = $km->jumlah;
        }

        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 150])
        ->labels($dateKasMasuk)
        ->datasets([
            [
                "label" => "Kas Masuk",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'data' => $kasMasuk,
            ]
        ])
        ->options([
            'legend' => [
                'display' => false
            ],
        ]);

        return view('backend.dashboard.dashboard', compact('title', 'chartjs', 'getData'));
    }

    public function profilForm()
    {
        $title = 'Profi Admin';

        return view('backend.dataAdmin.profile', compact('title'));
    }

    public function ubahProfil(Request $request)
    {
        $admin = Auth::user();
        $admin->update($request->all());

        return redirect()->back()->with('sukses', 'Berhasil mengubah profil.');
    }

    public function ubahPassword(Request $request)
    {
        if (!(Hash::check($request->lama, Auth::user()->password))) {
            return redirect()->back()->with("gagal","Password lama tidak sesuai. Silakan coba lagi.");
        }
         
        if(strcmp($request->lama, $request->baru) == 0){
            return redirect()->back()->with("gagal","Password baru tidak boleh sama dengan password Anda saat ini. Silakan pilih password yang berbeda.");
        }
        if(!(strcmp($request->baru, $request->ulangi)) == 0){
            return redirect()->back()->with("gagal","Password baru harus sama dengan password Anda yang diulangi. Ketikkan ulang password baru.");
        }

        $user = Auth::user();
        $user->password = bcrypt($request->baru);
        $user->save();
         
        return redirect()->back()->with("sukses","Password berhasil diubah !");
    }
}
