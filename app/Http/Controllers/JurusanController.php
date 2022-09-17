<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $cek = Jurusan::count();
        if ($cek == 0) {
            $urut = 1000;
            $nomer = $urut;
        } else {
            $ambil = Jurusan::all()->last();
            $urut = (int)substr($ambil->JurusanId, -8) + 1;
            $nomer = $urut;
        }
        return view('jurusan.index', [
            "title" => "Jurusan",
            "jurusan" => Jurusan::oldest()->Filter(request(['cari']))->get()
        ], compact('nomer'));
    }

    public function store(Request $request)
    {
        $Validasi = $request->validate([
            'JurusanId' => 'required',
            'Kode' => 'required|max:5',
            'JurusanNama' => 'required|max:30',
        ]);

        // dd($Validasi);
        Jurusan::create($Validasi);
        return redirect('/jurusan')->with('Berhasil', 'Menambahkan Data');
    }

    public function hapus($JurusanId, Request $request)
    {
        $jurusan = Jurusan::find($JurusanId);
        $jurusan->delete();
        return redirect('/jurusan')->with('Berhasil', 'Berhasil Menghapus Data ' . $JurusanId);
    }

    public function update($JurusanId, Request $request, Jurusan $jurusan)
    {
        $Validasi = $request->validate([
            'JurusanId' => 'required',
            'Kode' => 'required|max:5',
            'JurusanNama' => 'required|max:30',
        ]);
        // dd($Validasi);

        // Jurusan::where('JurusanId', $jurusan->JurusanId)->update($Validasi);


        $jurusan = Jurusan::find($JurusanId);
        $jurusan->update($request->except(['_token', 'sumbit']));

        return redirect('/jurusan')->with('Berhasil', 'Berhasil Mengubah Data ' . $JurusanId);
    }
}
