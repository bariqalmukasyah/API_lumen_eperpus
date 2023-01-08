<?php

namespace App\Http\Controllers;

use App\Peminjaman_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Peminjaman_detailController extends Controller
{
    public function index()
    {
        $peminjaman_detail = Peminjaman_detail::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Peminjaman_detail',
            'data'    => $peminjaman_detail
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'peminjaman_id'   => 'required',
        'buku_id' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $peminjaman_detail = Peminjaman_detail::create([
            'peminjaman_id'     => $request->input('peminjaman_id'),
            'buku_id'   => $request->input('buku_id'),
        ]);

        if ($peminjaman_detail) {
            return response()->json([
                'success' => true,
                'message' => 'Peminjaman_detail Berhasil Disimpan!',
                'data' => $peminjaman_detail
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Peminjaman_detail Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $peminjaman_detail = Peminjaman_detail::find($id);

   if ($peminjaman_detail) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Peminjaman_detail!',
           'data'      => $peminjaman_detail
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Peminjaman_detail Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'peminjaman_id'   => 'required',
        'buku_id' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $peminjaman_detail = Peminjaman_detail::whereId($id)->update([
            'peminjaman_id'     => $request->input('peminjaman_id'),
            'buku_id'   => $request->input('buku_id'),
        ]);

        if ($peminjaman_detail) {
            return response()->json([
                'success' => true,
                'message' => 'Peminjaman_detail Berhasil Diupdate!',
                'data' => $peminjaman_detail
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Peminjaman_detail Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $peminjaman_detail = Peminjaman_detail::whereId($id)->first();
		
$peminjaman_detail->delete();

    if ($peminjaman_detail) {
        return response()->json([
            'success' => true,
            'message' => 'Peminjaman_detail Berhasil Dihapus!',
        ], 200);
    }

}
}