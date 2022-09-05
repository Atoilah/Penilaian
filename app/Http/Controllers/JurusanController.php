<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        return view('jurusan.index', [
            "title" => "Jurusan",
            "jurusan" => Jurusan::oldest()->Filter(request(['cari']))->get()
        ]);
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

    public function update($JurusanId, Request $request, Jurusan $jurusan)
    {
        $Validasi = $request->validate([
            'JurusanId' => 'required|max:2',
            'Kode' => 'required|max:5',
            'JurusanNama' => 'required|max:30',
        ]);
        // dd($Validasi);

        // Jurusan::where('JurusanId', $jurusan->JurusanId)->update($Validasi);


        $jurusan = Jurusan::find($JurusanId);
        $jurusan->update($request->except(['_token', 'sumbit']));

        return redirect('/jurusan');
    }
}
