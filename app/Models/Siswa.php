<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
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
            return $query->where('NIS', 'Like', '%' . $search . '%')
                ->orwhere('JurusanNama', 'Like', '%' . $search . '%')
                ->orwhere('SiswaNama', 'Like', '%' . $search . '%');
        });
    }
}
