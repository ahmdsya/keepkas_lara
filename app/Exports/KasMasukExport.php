<?php

namespace App\Exports;

use Auth;
use App\KasMasuk;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KasMasukExport implements FromQuery, WithMapping, WithHeadings
{

	use Exportable;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
    	$date = \Carbon\Carbon::today()->subDays($this->value);

    	if ($this->value == 7 || $this->value == 30) {
    		return KasMasuk::query()->where([
    			['waktu', '>=', $date],
    			['kelas', Auth::user()->kelas]
    		]);
    	}
        return KasMasuk::query()->whereMonth('waktu', $this->value)->where('kelas', Auth::user()->kelas);
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
