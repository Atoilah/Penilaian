<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $primaryKey = 'JurusanId';
    // protected $fillable = [''];  //filtering field yang boleh diisi
    protected $guarded = [];

    public function scopeFilter($query, array $Filters)
    {
        // if (isset($Filters['cari']) ? $Filters['cari'] : false) {
        //     return $query->where('Kode', 'Like', '%' . $Filters['cari'] . '%')
        //         ->orwhere('JurusanNama', 'Like', '%' . $Filters['cari'] . '%')
        //         ->orwhere('JurusanId', 'Like', '%' . $Filters['cari'] . '%');
        // }

        $query->when($Filters['cari'] ?? false, function ($query, $search) {
            return $query->where('Kode', 'Like', '%' . $search . '%')
                ->orwhere('JurusanNama', 'Like', '%' . $search . '%')
                ->orwhere('JurusanId', 'Like', '%' . $search . '%');
        });
    }
}
