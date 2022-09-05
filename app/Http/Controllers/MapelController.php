<?php

namespace App\Http\Controllers;

use App\Models\Mapel;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {

        $mapel = Mapel::all();
        return view('mapel.index', [
            "title" => "Mapel",
            "mapel" => Mapel::oldest()->Filter(request(['cari']))->get()
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'sumbit']));
        $Validasi = $request->validate([
            'MapelId' => 'required|max:2',
            'MapelNama' => 'required|max:30',
        ]);
        Mapel::create($Validasi);
        return redirect('/mapel');
    }

    public function update($MapelId, Request $request)
    {
        $mapel = Mapel::find($MapelId);
        $mapel->update($request->except(['_token', 'sumbit']));
        return redirect('/mapel');
    }

    public function hapus($MapelId, Request $request)
    {
        $mapel = Mapel::find($MapelId);
        $mapel->delete();
        return redirect('/mapel');
    }
}
