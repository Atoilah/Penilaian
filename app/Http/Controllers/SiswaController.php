<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Event;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswa = DB::table('siswa');
        $cek = Siswa::count();
        $jurusan = DB::table('jurusan')->get();

        if ($cek == 0) {
            $urut = 1000;
            $nomer = $urut;
        } else {
            $ambil = Siswa::all()->last();
            $urut = (int)substr($ambil->NIS, -8) + 1;
            $nomer = $urut;
        }

        if ($request->cari != null) {
            $siswa = $siswa->where('NIS', 'like', '%' . $request->cari . '%')
                ->orWhere('SiswaNama', 'like', '%' . $request->cari . '%')
                ->orWhere('JenKel', 'like', '%' . $request->cari . '%');
        }
        if ($request->jurusan != null) {
            $siswa = $siswa->where('jurusan.JurusanId', 'like', $request->jurusan);
        }
        if ($request->jenkel != null) {
            $siswa = $siswa->where('JenKel', 'like', $request->jenkel);
        }

        $siswa = $siswa
            ->select('siswa.*', 'jurusan.JurusanNama')
            ->leftJoin('jurusan', 'jurusan.JurusanId', 'siswa.JurusanId')
            ->get();
        return view('siswa.index', ['siswa' => $siswa, 'jurusan' => $jurusan], compact('nomer'));
    }

    public function store(Request $request)
    {

        $Validasi = $request->validate([
            'NIS' => 'required',
            'SiswaNama' => 'required|max:30',
            'JurusanId' => 'required',
            'Kelas' => 'required',
            'JenKel' => 'required',
            'TglLahir' => 'required',
            'Alamat' => 'required',
        ]);

        Siswa::create($Validasi);
        return redirect('/siswa')->with('Berhasil', 'Menambahkan Data');
    }

    public function hapus($NIS, Request $request)
    {
        $siswa = siswa::find($NIS);
        $siswa->delete();
        return redirect('/siswa')->with('Berhasil', 'Berhasil Menghapus Data');
    }
    public function update($NIS, Request $request, Siswa $siswa)
    {
        $Validasi = $request->validate([
            'NIS' => 'required',
            'SiswaNama' => 'required|max:30',
            'JurusanId' => 'required',
            'Kelas' => 'required',
            'JenKel' => 'required',
            'TglLahir' => 'required',
            'Alamat' => 'required',
        ]);


        $siswa = Siswa::find($NIS);
        $siswa->update($request->except(['_token', 'sumbit']));

        return redirect('/siswa')->with('Berhasil', 'Berhasil MengUpdate Data');
    }

}
