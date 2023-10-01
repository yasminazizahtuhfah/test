<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portofolio extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_proyek','deskripsi','foto_proyek'];
    protected $table = 'portofolio';
    public $timestamps = false;
}
