<?php

namespace App\Http\Controllers;

use App\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Penerbit',
            'data'    => $penerbit
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'alamat' => 'required',
        'telp' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $penerbit = Penerbit::create([
            'nama'   => $request->input('nama'),
            'alamat'   => $request->input('alamat'),
            'telp'   => $request->input('telp'),
        ]);

        if ($penerbit) {
            return response()->json([
                'success' => true,
                'message' => 'Penerbit Berhasil Disimpan!',
                'data' => $penerbit
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Penerbit Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $penerbit = Penerbit::find($id);

   if ($penerbit) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Penerbit!',
           'data'      => $penerbit
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Penerbit Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'alamat' => 'required',
        'telp' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $penerbit = Penerbit::whereId($id)->update([
            'nama'   => $request->input('nama'),
            'alamat'   => $request->input('alamat'),
            'telp'   => $request->input('telp'),
        ]);

        if ($penerbit) {
            return response()->json([
                'success' => true,
                'message' => 'Penerbit Berhasil Diupdate!',
                'data' => $penerbit
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Penerbit Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $penerbit = Penerbit::whereId($id)->first();
		
$penerbit->delete();

    if ($penerbit) {
        return response()->json([
            'success' => true,
            'message' => 'Penerbit Berhasil Dihapus!',
        ], 200);
    }

}
}