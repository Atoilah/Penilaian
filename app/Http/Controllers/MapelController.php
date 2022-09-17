<?php

namespace App\Http\Controllers;

use App\Models\Mapel;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $cek = Mapel::count();

        if ($cek == 0) {
            $urut = 1000;
            $nomer = $urut;
        } else {
            $ambil = Mapel::all()->last();
            $urut = (int)substr($ambil->MapelId, -8) + 1;
            $nomer = $urut;
        }


        return view('mapel.index', [
            "title" => "Mapel",
            "mapel" => Mapel::oldest()->Filter(request(['cari']))->get()
        ], compact('nomer'));
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'sumbit']));
        $Validasi = $request->validate([
            'MapelId' => 'required',
            'MapelNama' => 'required|max:50',
        ]);
        Mapel::create($Validasi);
        return redirect('/mapel')->with('Berhasil', 'Menambahkan Data');
    }

    public function update($MapelId, Request $request)
    {
        $Validasi = $request->validate([
            'MapelId' => 'required',
            'MapelNama' => 'required|max:50',
        ]);
        $mapel = Mapel::find($MapelId);
        $mapel->update($request->except(['_token', 'sumbit']));
        return redirect('/mapel')->with('Berhasil', 'Berhasil Mengubah Data');
    }

    public function hapus($MapelId, Request $request)
    {
        $mapel = Mapel::find($MapelId);
        $mapel->delete();
        return redirect('/mapel')->with('Berhasil', 'Berhasil Menghapus Data');
    }
}
