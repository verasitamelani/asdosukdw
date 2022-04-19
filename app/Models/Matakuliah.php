<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_mk';
    protected $guarded = ['id_mk'];

    protected $table = 'matkul';
}
