<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $guarded = ['id'];
    protected $table = 'anggota';
}
