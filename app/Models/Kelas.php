<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id_kelas';
    protected $guarded = ['id_kelas'];

    protected $table = 'kelas';

    public function Kelas(){
        return $this->belongTo('App\Users');
    }

}
