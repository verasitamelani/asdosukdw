<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_rms';
    protected $guarded = ['is_rms'];

    protected $table = 'rumus';
}
