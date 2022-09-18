<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Event;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
        public function welcome(Request $request)
    {
        $siswa = DB::table('siswa');
        $siswi = DB::table('siswa');
        $jSiswa = Siswa::count();
        $jGuru = Guru::count();
        $jurusan = DB::table('jurusan')->get();

        $lSiswa = $siswa
            ->select('siswa.*')
            ->where('JenKel', 'L')
            ->count();

        $pSiswa = $siswi
            ->select('siswa.*')
            ->where('JenKel', 'P')
            ->count();

        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
        }


        return view('layout.home', ['siswa' => $siswa, 'jurusan' => $jurusan], compact('jSiswa', 'pSiswa', 'lSiswa', 'jGuru'));
    }
}
