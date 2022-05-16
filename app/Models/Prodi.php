<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'id_prodi';
    protected $guarded = ['id_prodi'];

    protected $table = 'prodi';
}
