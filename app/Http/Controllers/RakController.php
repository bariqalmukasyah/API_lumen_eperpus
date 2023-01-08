<?php

namespace App\Http\Controllers;

use App\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Rak',
            'data'    => $rak
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'kode_rak'   => 'required',
        'lokasi' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $rak = Rak::create([
            'kode_rak'     => $request->input('kode_rak'),
            'lokasi'   => $request->input('lokasi'),
        ]);

        if ($rak) {
            return response()->json([
                'success' => true,
                'message' => 'Rak Berhasil Disimpan!',
                'data' => $rak
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rak Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $rak = Rak::find($id);

   if ($rak) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Rak!',
           'data'      => $rak
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Rak Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'kode_rak'   => 'required',
        'lokasi' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $rak = Rak::whereId($id)->update([
            'kode_rak'     => $request->input('kode_rak'),
            'lokasi'   => $request->input('lokasi'),
        ]);

        if ($rak) {
            return response()->json([
                'success' => true,
                'message' => 'Rak Berhasil Diupdate!',
                'data' => $rak
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rak Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $rak = Rak::whereId($id)->first();
		
$rak->delete();

    if ($rak) {
        return response()->json([
            'success' => true,
            'message' => 'Rak Berhasil Dihapus!',
        ], 200);
    }

}
}