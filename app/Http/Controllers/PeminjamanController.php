<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Peminjaman',
            'data'    => $peminjaman
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'tanggal_pinjam'   => 'required',
        'tanggal_kembali' => 'required',
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

        $peminjaman = Peminjaman::create([
            'tanggal_pinjam'     => $request->input('tanggal_pinjam'),
            'tanggal_kembali'   => $request->input('tanggal_kembali'),
            'anggota_id'   => $request->input('anggota_id'),
            'petugas_id'   => $request->input('petugas_id'),
        ]);

        if ($peminjaman) {
            return response()->json([
                'success' => true,
                'message' => 'Peminjaman Berhasil Disimpan!',
                'data' => $peminjaman
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Peminjaman Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $peminjaman = Peminjaman::find($id);

   if ($peminjaman) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Peminjaman!',
           'data'      => $peminjaman
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Peminjaman Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'tanggal_pinjam'   => 'required',
        'tanggal_kembali' => 'required',
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

        $peminjaman = Peminjaman::whereId($id)->update([
            'tanggal_pinjam'     => $request->input('tanggal_pinjam'),
            'tanggal_kembali'   => $request->input('tanggal_kembali'),
            'anggota_id'   => $request->input('anggota_id'),
            'petugas_id'   => $request->input('petugas_id'),
        ]);

        if ($peminjaman) {
            return response()->json([
                'success' => true,
                'message' => 'Peminjaman Berhasil Diupdate!',
                'data' => $peminjaman
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Peminjaman Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $peminjaman = Peminjaman::whereId($id)->first();
		
$peminjaman->delete();

    if ($peminjaman) {
        return response()->json([
            'success' => true,
            'message' => 'Peminjaman Berhasil Dihapus!',
        ], 200);
    }

}
}