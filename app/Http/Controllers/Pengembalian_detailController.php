<?php

namespace App\Http\Controllers;

use App\Pengembalian_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Pengembalian_detailController extends Controller
{
    public function index()
    {
        $pengembalian_detail = Pengembalian_detail::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Pengembalian_detail',
            'data'    => $pengembalian_detail
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'pengembalian_id'   => 'required',
        'buku_id' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $pengembalian_detail = Pengembalian_detail::create([
            'pengembalian_id'     => $request->input('pengembalian_id'),
            'buku_id'   => $request->input('buku_id'),
        ]);

        if ($pengembalian_detail) {
            return response()->json([
                'success' => true,
                'message' => 'Pengembalian_detail Berhasil Disimpan!',
                'data' => $pengembalian_detail
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pengembalian_detail Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $pengembalian_detail = Pengembalian_detail::find($id);

   if ($pengembalian_detail) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Pengembalian_detail!',
           'data'      => $pengembalian_detail
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Pengembalian_detail Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'pengembalian_id'   => 'required',
        'buku_id' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $pengembalian_detail = Pengembalian_detail::whereId($id)->update([
            'pengembalian_id'     => $request->input('pengembalian_id'),
            'buku_id'   => $request->input('buku_id'),
        ]);

        if ($pengembalian_detail) {
            return response()->json([
                'success' => true,
                'message' => 'Pengembalian_detail Berhasil Diupdate!',
                'data' => $pengembalian_detail
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pengembalian_detail Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $pengembalian_detail = Pengembalian_detail::whereId($id)->first();
		
$pengembalian_detail->delete();

    if ($pengembalian_detail) {
        return response()->json([
            'success' => true,
            'message' => 'Pengembalian_detail Berhasil Dihapus!',
        ], 200);
    }

}
}