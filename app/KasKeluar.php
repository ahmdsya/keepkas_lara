<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KasKeluar extends Model
{
    protected $fillable = ['keterangan', 'tanggal', 'jumlah'];
}
