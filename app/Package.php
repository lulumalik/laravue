<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $table = 'package';
    protected $fillable = ['class_name', 'price', 'category'];
}
