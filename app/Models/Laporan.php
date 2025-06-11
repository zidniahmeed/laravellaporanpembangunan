<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table ='laporan';
    protected $guarded = [];
        protected $primaryKey = 'idlaporan';


    public function kelurahan(){
        return $this->belongsTo(Kelurahan::class, 'idkelurahan');
    }
}
