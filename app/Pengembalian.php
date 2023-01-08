<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    /**
     * @var string
     */
    protected $table = 'pengembalian';

    /**
     * @var array
     */
    protected $fillable = [
        'tanggal_pengembalian', 'denda', 'peminjaman_id', 'anggota_id', 'petugas_id',
    ];
}