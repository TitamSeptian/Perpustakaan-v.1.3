<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $guarded = ['id'];
    protected $table = 'buku';
}