<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
     // READ: ambil semua data
    public function index()
    {
        $tabungans = Tabungan::latest()->get();
        return response()->json($tabungans);
    }

    // CREATE: simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'amount' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $tabungan = Tabungan::create($request->all());

        return response()->json(['message' => 'Tabungan berhasil ditambahkan', 'data' => $tabungan], 201);
    }

    // UPDATE: ubah data tabungan tertentu
    public function update(Request $request, $id)
    {
        $tabungan = Tabungan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'amount' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $tabungan->update($request->all());

        return response()->json(['message' => 'Tabungan berhasil diperbarui', 'data' => $tabungan]);
    }

    // DELETE: hapus data tabungan tertentu
    public function destroy($id)
    {
        $tabungan = Tabungan::findOrFail($id);
        $tabungan->delete();

        return response()->json(['message' => 'Tabungan berhasil dihapus']);
    }
}
