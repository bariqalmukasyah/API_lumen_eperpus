<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    /**
     * @var string
     */
    protected $table = 'pengarang';

    /**
     * @var array
     */
    protected $fillable = [
        'nama', 'alamat', 'telp',
    ];
}