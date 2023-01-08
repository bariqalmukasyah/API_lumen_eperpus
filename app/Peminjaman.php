<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /**
     * @var string
     */
    protected $table = 'peminjaman';

    /**
     * @var array
     */
    protected $fillable = [
        'tanggal_pinjam', 'tanggal_kembali', 'anggota_id', 'petugas_id',
    ];
}