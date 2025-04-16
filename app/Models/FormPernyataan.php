<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormPernyataan extends Model
{
    use SoftDeletes;

    protected $fillable = ['karyawan_id', 'tanggal', 'isi_pernyataan', 'ditandatangani_oleh'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
