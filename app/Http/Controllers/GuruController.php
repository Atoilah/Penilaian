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
        return redirect('/guru');
    }

    public function hapus($NIP, Request $request)
    {
        $guru = Guru::find($NIP);
        $guru->delete();
        return redirect('/guru');
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('guru')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')
                    ->where('NIP', 'like', '%' . $query . '%')
                    ->orWhere('GuruNama', 'like', '%' . $query . '%')
                    ->orWhere('MapelNama', 'like', '%' . $query . '%')
                    ->orWhere('JenKel', 'like', '%' . $query . '%')
                    ->orWhere('Status', 'like', '%' . $query . '%')
                    ->orderBy('NIP', 'desc')
                    ->get();
            } else {
                $data =
                    DB::table('guru')->leftJoin('mapel', 'guru.MapelId', '=', 'mapel.MapelId')
                    ->orderBy('NIP', 'desc')
                    ->get();
            }

            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6">' . $row->NIP . '</td>
                    <td class="py-4 px-6">' . $row->GuruNama . '</td>
                    <td class="py-4 px-6">' . $row->MapelNama . '</td>
                    <td class="py-4 px-6">' . $row->JenKel . '</td>
                    <td class="py-4 px-6">' . $row->Status . '</td>
                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-4 px-6" align="center" colspan="5">Data tidak ditemukan</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }


    // public function cari(Request $request)
    // {
    //     $Ambil = $request->cari;
    //     return $guru = Guru::where('NIP', 'LIKE', '%' . $Ambil . '%')->get();
    // }
}
