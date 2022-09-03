<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function index()
    {

        $guru = DB::table('guru')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')->get();
        return view('guru.index', ['mapel' => Mapel::all()])->with('guru', $guru);
    }

    public function store(Request $request)
    {
        // dd($request->except(['_token', 'sumbit']));

        $Validasi = $request->validate([
            'NIP' => 'required|max:12|min:12',
            'GuruNama' => 'required|max:30',
            'MapelId' => 'required|max:1',
            'JenKel' => 'required|max:1',
            'Status' => 'required|max:1',
        ]);

        // dd($Validasi);
        Guru::create($Validasi);
        return redirect('/guru')->with('Berhasil', 'Menambahkan Data');
        // Guru::create($request->except(['_token', 'sumbit']));
        // return redirect('/guru');
    }

    public function update($NIP, Request $request, Guru $guru)
    {
        $Validasi = $request->validate([
            'NIP' => 'required|max:12|min:12',
            'GuruNama' => 'required|max:30',
            'MapelId' => 'required|max:1',
            'JenKel' => 'required|max:1',
            'Status' => 'required|max:1',
        ]);

        $guru = Guru::find($NIP);
        $guru->update($request->except(['_token', 'sumbit']));
        // Guru::where('NIP', $guru->NIP)->update($Validasi);
        // return redirect('/guru');
    }

    public function hapus($NIP, Request $request)
    {
        $guru = Guru::find($NIP);
        $guru->delete();
        return redirect('/guru');
    }


    public function cari(Request $request)
    {
        $Ambil = $request->cari;

        $guru = Guru::all()
            ->where('Nama', 'like', "%" . $Ambil . "%");
        // ->paginate();

        // mengirim data guru ke view index
        return view('guru.index')->with('guru', $guru);
    }
}
