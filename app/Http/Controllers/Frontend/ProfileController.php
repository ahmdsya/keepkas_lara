<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Image;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request, $id)
    {
    	$title = 'Profile';
    	$getUser = User::find($id);
        $active = $request->segment(1);

    	return view('frontend.profile.profile', compact('title', 'getUser', 'active'));
    }

    public function ubahFoto(Request $request)
    {

        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $eks = $request->file('foto')->getClientOriginalExtension();
        $fileName = Auth::user()->username.'.jpg';
        $path = public_path('/template/assets/img/avatar');

        if (is_file($path.$fileName)) {
            unlink($path.$fileName);
        }

        if (in_array($eks, ['png', 'jpg', 'jpeg', 'gif']) === true) {
            $img = (string) Image::make($request->file('foto')
                ->getRealPath())
                ->resize(100, 100)
                ->save($path.'/'.$fileName);
            $siswa = User::find(Auth::user()->id);
            $siswa->update([
                'foto' => $fileName
            ]);
            
        }else{
            return redirect()->back()->with('gagal', 'File yang Anda upload bukan gambar.');
        }

        return redirect()->back()->with('sukses', 'Berhasil foto profil.');

    }

    public function ubahProfil(Request $request)
    {
        $siswa = User::find(Auth::user()->id);
        $siswa->update([
            'email' => $request->email
        ]);

        return redirect()->back()->with('sukses', 'Berhasil update profil.');
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
