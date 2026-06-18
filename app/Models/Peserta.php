<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = ['nama_lengkap', 'email', 'nomor_hp'];

    public function registrasis()
    {
        return $this->hasMany(Registrasi::class);
    }
}
