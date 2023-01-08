<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    /**
     * @var string
     */
    protected $table = 'anggota';

    /**
     * @var array
     */
    protected $fillable = [
        'nama', 'jenis_kelamin', 'alamat', 'telp',
    ];
}