<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportSiswaController extends Controller
{
    public function import(Request $request)
    {
        $eks = $request->file('file')->getClientOriginalExtension();

        if ($eks == 'xlsx') {
            Excel::import(new UsersImport, $request->file('file'));
            return redirect()->route('data-siswa.index')->with('sukses', 'Suskes!');
        }

        return redirect()->back()->with('gagal', 'Format file bukan Excel (.xlsx).');
        
    }
}
