<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['nama_event', 'image', 'deskripsi', 'tanggal', 'lokasi', 'kapasitas', 'harga_tiket'];

    public function registrasis()
    {
        return $this->hasMany(Registrasi::class);
    }
}
