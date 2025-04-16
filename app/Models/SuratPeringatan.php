<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratPeringatan extends Model
{
    use SoftDeletes;

    protected $fillable = ['karyawan_id', 'jenis', 'tanggal', 'alasan', 'file_surat'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
