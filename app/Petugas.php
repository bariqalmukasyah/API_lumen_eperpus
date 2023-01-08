<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    /**
     * @var string
     */
    protected $table = 'petugas';

    /**
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'nama', 'telp', 'alamat',
    ];
}