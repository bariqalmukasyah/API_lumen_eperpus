<?php

namespace App\Http\Controllers;

use App\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Pengembalian',
            'data'    => $pengembalian
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'tanggal_pengembalian'   => 'required',
        'denda' => 'required',
        'peminjaman_id' => 'required',
        'anggota_id' => 'required',
        'petugas_id' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $pengembalian = Pengembalian::create([
            'tanggal_pengembalian'     => $request->input('tanggal_pengembalian'),
            'denda'   => $request->input('denda'),
            'peminjaman_id'   => $request->input('peminjaman_id'),
            'anggota_id'   => $request->input('anggota_id'),
            'petugas_id'   => $request->input('petugas_id'),
        ]);

        if ($pengembalian) {
            return response()->json([
                'success' => true,
                'message' => 'Pengembalian Berhasil Disimpan!',
                'data' => $pengembalian
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pengembalian Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $pengembalian = Pengembalian::find($id);

   if ($pengembalian) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Pengembalian!',
           'data'      => $pengembalian
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Pengembalian Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'tanggal_pengembalian'   => 'required',
        'denda' => 'required',
        'peminjaman_id' => 'required',
        'anggota_id' => 'required',
        'petugas_id' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $pengembalian = Pengembalian::whereId($id)->update([
            'tanggal_pengembalian'     => $request->input('tanggal_pengembalian'),
            'denda'   => $request->input('denda'),
            'peminjaman_id'   => $request->input('peminjaman_id'),
            'anggota_id'   => $request->input('anggota_id'),
            'petugas_id'   => $request->input('petugas_id'),
        ]);

        if ($pengembalian) {
            return response()->json([
                'success' => true,
                'message' => 'Pengembalian Berhasil Diupdate!',
                'data' => $pengembalian
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pengembalian Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $pengembalian = Pengembalian::whereId($id)->first();
		
$pengembalian->delete();

    if ($pengembalian) {
        return response()->json([
            'success' => true,
            'message' => 'Pengembalian Berhasil Dihapus!',
        ], 200);
    }

}
}