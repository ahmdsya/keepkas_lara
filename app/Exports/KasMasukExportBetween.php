<?php

namespace App\Exports;

use Auth;
use App\KasMasuk;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KasMasukExportBetween implements FromQuery, WithMapping, WithHeadings
{

	use Exportable;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return KasMasuk::query()
        	->whereBetween('waktu', [$this->from, $this->to])
        	->where('kelas', Auth::user()->kelas);
    }

    public function map($kasmasuk): array
    {
        return [
            $kasmasuk->nis,
            $kasmasuk->nama,
            $kasmasuk->kelas,
            $kasmasuk->waktu,
            $kasmasuk->status,
            $kasmasuk->jumlah,
        ];
    }

    public function headings(): array
    {
        return [
            'NOMOR INDUK',
            'NAMA LENGKAP',
            'KELAS',
            'WAKTU',
            'STATUS',
            'JUMLAH',
        ];
    }
}
