<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divisi extends Model
{
    use SoftDeletes;

    protected $fillable = ['nama_divisi'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
