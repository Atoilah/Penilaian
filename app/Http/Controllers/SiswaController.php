<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    public function index()
    {

        $siswa = DB::table('siswa')->leftJoin('jurusan', 'siswa.JurusanId', '=', 'jurusan.JurusanId')->get();
        return view('siswa.index', ['jurusan' => Jurusan::all()])->with('siswa', $siswa);
    }

    public function store(Request $request)
    {

        $Validasi = $request->validate([
            'NIS' => 'required',
            'SiswaNama' => 'required|max:30',
            'JurusanId' => 'required|max:1',
            'Kelas' => 'required|max:1',
            'JenKel' => 'required|max:1',
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
        return redirect('/siswa');
    }
    public function update($NIS, Request $request, Siswa $siswa)
    {
        $Validasi = $request->validate([
            'NIS' => 'required',
            'SiswaNama' => 'required|max:30',
            'JurusanId' => 'required|max:1',
            'Kelas' => 'required|max:1',
            'JenKel' => 'required|max:1',
            'TglLahir' => 'required',
            'Alamat' => 'required',
        ]);
        // dd($Validasi);

        // Siswa::where('NIS', $Siswa->NIS)->update($Validasi);


        $siswa = Siswa::find($NIS);
        $siswa->update($request->except(['_token', 'sumbit']));

        return redirect('/siswa');
    }
}
