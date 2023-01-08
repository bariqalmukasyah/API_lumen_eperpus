<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    /**
     * @var string
     */
    protected $table = 'penerbit';

    /**
     * @var array
     */
    protected $fillable = [
        'nama', 'alamat', 'telp',
    ];
}