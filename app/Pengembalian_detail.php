<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian_detail extends Model
{
    /**
     * @var string
     */
    protected $table = 'pengembalian_detail';

    /**
     * @var array
     */
    protected $fillable = [
        'pengembalian_id', 'buku_id',
    ];
}