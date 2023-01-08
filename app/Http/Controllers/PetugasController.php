<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Petugas',
            'data'    => $petugas
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username'   => 'required',
        'password' => 'required',
        'nama' => 'required',
        'telp' => 'required',
        'alamat' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $petugas = Petugas::create([
            'username'     => $request->input('username'),
            'password'   => $request->input('password'),
            'nama'   => $request->input('nama'),
            'telp'   => $request->input('telp'),
            'alamat'   => $request->input('alamat'),
        ]);

        if ($petugas) {
            return response()->json([
                'success' => true,
                'message' => 'Petugas Berhasil Disimpan!',
                'data' => $petugas
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Petugas Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $petugas = Petugas::find($id);

   if ($petugas) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Petugas!',
           'data'      => $petugas
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Petugas Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'username'   => 'required',
        'password' => 'required',
        'nama' => 'required',
        'telp' => 'required',
        'alamat' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $petugas = Petugas::whereId($id)->update([
            'username'     => $request->input('username'),
            'password'   => $request->input('password'),
            'nama'   => $request->input('nama'),
            'telp'   => $request->input('telp'),
            'alamat'   => $request->input('alamat'),
        ]);

        if ($petugas) {
            return response()->json([
                'success' => true,
                'message' => 'Petugas Berhasil Diupdate!',
                'data' => $petugas
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Petugas Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $petugas = Petugas::whereId($id)->first();
		
$petugas->delete();

    if ($petugas) {
        return response()->json([
            'success' => true,
            'message' => 'Petugas Berhasil Dihapus!',
        ], 200);
    }

}
}