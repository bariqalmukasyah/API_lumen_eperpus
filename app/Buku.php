<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /**
     * @var string
     */
    protected $table = 'buku';

    /**
     * @var array
     */
    protected $fillable = [
        'judul', 'tahun_terbit', 'jumlah', 'isbn', 'pengarang_id', 'penerbit_id', 'rak_kode_rak',
    ];
}