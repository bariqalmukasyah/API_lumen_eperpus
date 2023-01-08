<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman_detail extends Model
{
    /**
     * @var string
     */
    protected $table = 'peminjaman_detail';

    /**
     * @var array
     */
    protected $fillable = [
        'peminjaman_id', 'buku_id',
    ];
}