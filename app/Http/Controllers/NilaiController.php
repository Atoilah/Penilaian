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
    public function index(Request $request)
    {
        $nilai = DB::table('nilai');
        $cek = Nilai::count();
        $guru = DB::table('guru')->get();
        $siswa = DB::table('siswa')->get();
        $mapel = DB::table('mapel')->get();

        if ($cek == 0) {
            $urut = 1000;
            $nomer = $urut;
        } else {
            $ambil = Nilai::all()->last();
            $urut = (int)substr($ambil->NilaiId, -8) + 1;
            $nomer = $urut;
        }

        if ($request->cari != null) {
            $nilai = $nilai->where('MapelNama', 'like', '%' . $request->cari . '%')
                ->orWhere('SiswaNama', 'like', '%' . $request->cari . '%');
        }

        $nilai = $nilai
            ->select('nilai.*', 'siswa.*', 'guru.*', 'mapel.*')
            ->leftJoin('siswa', 'siswa.NIS', 'nilai.NIS')
            ->leftJoin('guru', 'guru.NIP', 'nilai.NIP')
            ->leftJoin('mapel', 'mapel.MapelId', 'guru.MapelId')
            ->get();

        // dd($nilai);

        $gabungan = DB::table('guru')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')->get();
        return view('nilai.index', ['nilai' => $nilai, 'guru' => $guru, 'siswa' => $siswa, 'mapel' => $mapel], compact('nomer'))->with('gab', $gabungan);
        // $nilai = DB::table('nilai')->leftJoin('siswa', 'nilai.NIS', '=', 'siswa.NIS')->leftJoin('guru', 'nilai.NIP', '=', 'guru.NIP')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')->get();
        // return view('nilai.index', ['siswa' => Siswa::all()], ['guru' => Guru::all()], ['mapel' => Mapel::all()])->with('nilai', $nilai)->with('gab', $gabungan);
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
            'Total' => 'required',
            'Rata' => 'required',
        ]);
        // dd($Validasi);
        nilai::create($Validasi);
        return redirect('/nilai')->with('Berhasil', 'Menambahkan Data');
        // Nilai::create($request->except(['_token', 'sumbit']));
        // return redirect('/nilai');
    }

    public function update($NilaiId, Request $request)
    {
        $nilai = Nilai::find($NilaiId);
        $nilai->update($request->except(['_token', 'sumbit']));
        return redirect('/nilai')->with('Berhasil', 'Mengubah Data');
    }

    public function hapus($NilaiId, Request $request)
    {
        $nilai = Nilai::find($NilaiId);
        $nilai->delete();
        return redirect('/nilai')->with('Berhasil', 'Menghapus Data');
    }
}
