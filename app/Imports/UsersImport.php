<?php

namespace App\Imports;

use App\User;
use App\Kelas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $kelas = Kelas::where('kelas', $row['kelas'])->count();

        if ($kelas < 1) {
            
            $kls = new Kelas;
            $kls->kelas = $row['kelas'];
            $kls->save();
        }

        return new User([
            'name'     => $row['nama'],
            'email'    => $row['email'],
            'password' => bcrypt($row['nis']),
            'username' => $row['nis'],
            'kelas' => $row['kelas'],
            'remember_token' => str_random(60)
        ]);
    }
}
