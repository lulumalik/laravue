<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    protected $table = 'zakat';
    protected $fillable = ['nama','jenis','jumlah','keterangan_jumlah', 'file' , 'deskripsi', 'id_post'];
}