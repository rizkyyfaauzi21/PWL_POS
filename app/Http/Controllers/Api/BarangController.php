<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        $barang = BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'image' => $request->image->hashName(),
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $imageName = $request->image->hashName() . '.' . $image->getClientOriginalExtension();
            $imageName = $request->image->hashName();
            $image->move(public_path('posts'), $imageName);
        }

        return response()->json($barang, 201);
    }

    public function show(BarangModel $barang)
    {
        return response()->json($barang);
    }

    public function update(Request $request, BarangModel $barang)
    {
        $barang->update($request->all());
        if ($request->filled('image')) {
            $barang->update(['image' => $request->image->hashName()]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                // $imageName = $request->image->hashName() . '.' . $image->getClientOriginalExtension();
                $imageName = $request->image->hashName() . '.webp';
                $image->move(public_path('posts'), $imageName);
            }
            $barang->update($request->except('image'));
        } else {
            $barang->update($request->all());
        }
        return BarangModel::find($barang);
    }

    public function destroy(BarangModel $barang)
    {
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}