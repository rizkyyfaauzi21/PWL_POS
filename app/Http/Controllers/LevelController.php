<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\LevelDataTable;
use App\Models\LevelModel;

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
    public function store(Request $request)
    {
        LevelModel::create([
            // 'level_id' => $request->levelId,
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel,
        ]);
        return redirect('/level');
    }
}
