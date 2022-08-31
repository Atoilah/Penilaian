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
}
