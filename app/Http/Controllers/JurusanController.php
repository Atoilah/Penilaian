<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {

        $jurusan = Jurusan::all();
        return view('jurusan.index')->with('jurusan', $jurusan);
    }

    public function store(Request $request)
    {
        $Validasi = $request->validate([
            'JurusanId' => 'required|max:2',
            'Kode' => 'required|max:5',
            'JurusanNama' => 'required|max:30',
        ]);

        // dd($Validasi);
        Jurusan::create($Validasi);
        return redirect('/jurusan');
    }

    public function hapus($JurusanId, Request $request)
    {
        $jurusan = Jurusan::find($JurusanId);
        $jurusan->delete();
        return redirect('/jurusan');
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $Validasi = $request->validate([
            'JurusanId' => 'required|max:2',
            'Kode' => 'required|max:5',
            'JurusanNama' => 'required|max:35',
        ]);
        // $guru = Guru::find($JurusanId);
        // $guru->update($request->except(['_token', 'sumbit']));
        Jurusan::where('JurusanId', $jurusan->JurusanId)->update($Validasi);
        return redirect('/jurusan');
    }
}
