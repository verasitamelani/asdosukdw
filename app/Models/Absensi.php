<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_absensi';
    protected $guarded = ['id_absensi'];

    protected $table = 'absensi';
}
