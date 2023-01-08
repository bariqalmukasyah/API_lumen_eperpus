<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    //all
    /**
     * @OA\Get(
     *      path="/anggota",
     *      summary="Get All Anggota",
     *      tags={"GET"},
     *      @OA\Response(response="200", description="Data is successfully retrivied")
     * )
     */
    public function index()
    {
        $anggota = Anggota::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Anggota',
            'data'    => $anggota
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama'   => 'required',
        'jenis_kelamin' => 'required',
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

        $anggota = Anggota::create([
            'nama'     => $request->input('nama'),
            'jenis_kelamin'   => $request->input('jenis_kelamin'),
            'alamat'   => $request->input('alamat'),
            'telp'   => $request->input('telp'),
        ]);

        if ($anggota) {
            return response()->json([
                'success' => true,
                'message' => 'Anggota Berhasil Disimpan!',
                'data' => $anggota
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Anggota Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $anggota = Anggota::find($id);

   if ($anggota) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Anggota!',
           'data'      => $anggota
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Anggota Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama'   => 'required',
        'jenis_kelamin' => 'required',
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

        $anggota = Anggota::whereId($id)->update([
            'nama'     => $request->input('nama'),
            'jenis_kelamin'   => $request->input('jenis_kelamin'),
            'alamat'   => $request->input('alamat'),
            'telp'   => $request->input('telp'),
        ]);

        if ($anggota) {
            return response()->json([
                'success' => true,
                'message' => 'Anggota Berhasil Diupdate!',
                'data' => $anggota
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Anggota Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $anggota = Anggota::whereId($id)->first();
		
$anggota->delete();

    if ($anggota) {
        return response()->json([
            'success' => true,
            'message' => 'Anggota Berhasil Dihapus!',
        ], 200);
    }

}

}