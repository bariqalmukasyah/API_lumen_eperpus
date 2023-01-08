<?php

namespace App\Http\Controllers;

use App\Pengarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengarangController extends Controller
{
    public function index()
    {
        $pengarang = Pengarang::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Pengarang',
            'data'    => $pengarang
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

        $pengarang = Pengarang::create([
            'nama'   => $request->input('nama'),
            'alamat'   => $request->input('alamat'),
            'telp'   => $request->input('telp'),
        ]);

        if ($pengarang) {
            return response()->json([
                'success' => true,
                'message' => 'Pengarang Berhasil Disimpan!',
                'data' => $pengarang
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pengarang Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $pengarang = Pengarang::find($id);

   if ($pengarang) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Pengarang!',
           'data'      => $pengarang
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Pengarang Tidak Ditemukan!',
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

        $pengarang = Pengarang::whereId($id)->update([
            'nama'   => $request->input('nama'),
            'alamat'   => $request->input('alamat'),
            'telp'   => $request->input('telp'),
        ]);

        if ($pengarang) {
            return response()->json([
                'success' => true,
                'message' => 'Pengarang Berhasil Diupdate!',
                'data' => $pengarang
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Pengarang Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $pengarang = Pengarang::whereId($id)->first();
		
$pengarang->delete();

    if ($pengarang) {
        return response()->json([
            'success' => true,
            'message' => 'Pengarang Berhasil Dihapus!',
        ], 200);
    }

}
}