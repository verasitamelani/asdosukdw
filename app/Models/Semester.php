<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_smt';
    protected $guarded = ['is_smt'];

    protected $table = 'semester';
}
