<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_gaji';
    protected $guarded = ['id_gaji'];

    protected $table = 'gaji';
}
