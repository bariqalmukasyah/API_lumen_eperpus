<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    /**
     * @var string
     */
    protected $table = 'rak';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_rak', 'lokasi',
    ];
}