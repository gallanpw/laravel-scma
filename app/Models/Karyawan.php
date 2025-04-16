<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama', 'nip', 'divisi_id', 'jabatan', 'tanggal_masuk'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function formPernyataans()
    {
        return $this->hasMany(FormPernyataan::class);
    }

    public function teguranTertulis()
    {
        return $this->hasMany(TeguranTertulis::class);
    }

    public function suratPeringatans()
    {
        return $this->hasMany(SuratPeringatan::class);
    }
}
