<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class identitas extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','kewarganegaraan','status','pas_foto'];
    protected $table = 'identitas';
    public $timestamps = false;
}
