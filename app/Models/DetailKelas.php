<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKelas extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'id_detail';
    protected $guarded = ['id_detail'];

    protected $table = 'detail_kelas';
}
