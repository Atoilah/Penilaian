<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {
        // $guru = DB::table('guru')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')->get();
        // return view('guru.index', ['mapel' => Mapel::all()])->with('guru', $guru);

        $nilai = DB::table('nilai')->leftJoin('siswa', 'nilai.NIS', '=', 'siswa.NIS')->leftJoin('guru', 'nilai.NIP', '=', 'guru.NIP')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')->get();
        $gabungan = DB::table('guru')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')->get();
        return view('nilai.index', ['siswa' => Siswa::all()], ['guru' => Guru::all()], ['mapel' => Mapel::all()])->with('nilai', $nilai)->with('gab', $gabungan);
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'sumbit']));
        $Validasi = $request->validate([
            'NilaiId' => 'required',
            'NIS' => 'required',
            'NIP' => 'required',
            'NilaiUh' => 'required',
            'NilaiPraktek' => 'required',
            'NilaiPTS' => 'required',
            'NilaiPAS' => 'required',
        ]);
        // dd($Validasi);
        nilai::create($Validasi);
        return redirect('/nilai');
        // Nilai::create($request->except(['_token', 'sumbit']));
        // return redirect('/nilai');
    }

    public function update($NilaiId, Request $request)
    {
        $nilai = Nilai::find($NilaiId);
        $nilai->update($request->except(['_token', 'sumbit']));
        return redirect('/nilai');
    }

    public function hapus($NilaiId, Request $request)
    {
        $nilai = Nilai::find($NilaiId);
        $nilai->delete();
        return redirect('/nilai');
    }
}
