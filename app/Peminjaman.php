<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    protected $guarded = ['id'];
    protected $table = 'peminjaman';
    protected $dates = ['deleted_at'];
}
