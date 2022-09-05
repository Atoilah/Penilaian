<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $primaryKey = 'MapelId';
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
            return $query->where('MapelId', 'Like', '%' . $search . '%')
                ->orwhere('MapelNama', 'Like', '%' . $search . '%');
        });
    }
}
