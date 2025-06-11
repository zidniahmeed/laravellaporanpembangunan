<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';
    protected $primaryKey = 'idkelurahan';
    protected $fillable = [
        'namakelurahan', 'kecamatan', 'kabupaten', 'provinsi',
        'alamatkelurahan', 'nohpkelurahan', 'fotokelurahan',
        'latitude', 'longitude'
    ];
}

