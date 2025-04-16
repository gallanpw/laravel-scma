<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeguranTertulis extends Model
{
    use SoftDeletes;

    protected $fillable = ['karyawan_id', 'tanggal', 'alasan_teguran', 'file_surat'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
