<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    protected $fillable = ['admin_id', 'nama', 'email', 'kelas'];
}
