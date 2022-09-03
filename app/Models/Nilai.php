<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $primaryKey = 'NilaiId';
    // protected $fillable = [''];  //filtering field yang boleh diisi
    protected $guarded = [];
}
