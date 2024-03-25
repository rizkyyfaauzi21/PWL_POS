<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\LevelDataTable;
use App\Http\Requests\StorePostRequestLevel;
use App\Models\LevelModel;
use Illuminate\Http\RedirectResponse as HttpRedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LevelController extends Controller
{
    //
    public function index(LevelDataTable $dataTable)
    {


        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // $row = DB::delete('delete from m_level where level_kode = ?', ['Cus']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        // $data = DB::select('select * from m_level');
        // return view('level', ['data' => $data]);
        return $dataTable->render('level.index');
    }
    public function create()
    {
        return view('level.create');
    }
    public function store(StorePostRequestLevel $request): RedirectResponse
    {
        // LevelModel::create([
        //     // 'level_id' => $request->levelId,
        //     'level_kode' => $request->kodeLevel,
        //     'level_nama' => $request->namaLevel,
        // ]);
        $validated = $request->validate([
            // 'level_kode' => 'required',
            // 'level_nama' => 'required',
        ]);
        $validated = $request->safe()->only(['level_kode', 'level_nama']);
        $validated = $request->safe()->except(['level_kode', 'level_nama']);

        return redirect('/level');
    }
}
