<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use App\Models\DetailModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        // return TransaksiModel::with('detail')->get();
        return DetailModel::with(['penjualan', 'barang'])->get();
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|integer',
                'pembeli' => 'required|string|max:100',
                'penjualan_kode' => 'required|string|max:8|unique:t_penjualan,penjualan_kode',
                'barang_id' => 'required|integer',
                'jumlah' => 'required|integer',
            ]);
            DB::beginTransaction();

            $tran = TransaksiModel::create([
                'user_id' => $request->user_id,
                'pembeli' => $request->pembeli,
                'penjualan_kode' => $request->penjualan_kode,
                'penjualan_tanggal' => now(),
            ]);

            $item = BarangModel::find($request->barang_id);
            // dd('Bot');

            $transaksi = DetailModel::create([
                'penjualan_id' => $tran->penjualan_id,
                'barang_id' => $request->barang_id,
                'harga' => $item->harga_jual,
                'jumlah' => $request->jumlah,
            ]);
            DB::commit();
            return response()->json($transaksi, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th);
            return response()->json($th, 404);
        }

        // $transaksi = TransaksiModel::create($request->all());
    }

    public function show(TransaksiModel $transaksi)
    {
        $penjualan = TransaksiModel::with('detail')->find($transaksi->penjualan_id);
        // $detail = DetailModel::with('barang')->where('penjualan_id', '=', $transaksi->penjualan_id)->get();
        return response()->json([
            'Transaksi' => $penjualan,
            // 'Detail Transaksi' => $detail,
        ]);
    }

    public function update(Request $request, DetailModel $transaksi)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|max:8|unique:t_penjualan,penjualan_kode,' . $transaksi->penjualan_id . ',penjualan_id',
        ]);
        TransaksiModel::find($transaksi->penjualan_id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
        ]);

        BarangModel::find($request->barang_id);

        for ($i = 0; $i < $request->count; $i++) {
            DetailModel::find($request->id[$i])->update([
                'barang_id' => $request->barang_id[$i],
                'jumlah' => $request->jumlah[$i],
            ]);
        }

        $penjualan = TransaksiModel::find($transaksi->penjualan_id);
        $penjualanDetail = DetailModel::with('barang')->where('penjualan_id', '=', $transaksi->penjualan_id)->get();
        return response()->json([
            'Transaksi' => $penjualan,
            'Detail Transaksi' => $penjualanDetail,
        ]);
    }

    public function destroy(DetailModel $transaksi)
    {
        $check = TransaksiModel::find($transaksi->penjualan_id);
        if (!$check) {
            return redirect('/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        try {
            DetailModel::where('penjualan_id', $check->penjualan_id)->delete();
            TransaksiModel::destroy($transaksi->penjualan_id);

            return response()->json([
                'success' => true,
                'message' => 'Data terhapus',
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak terhapus karena foreign key',
            ]);
        }
    }
}