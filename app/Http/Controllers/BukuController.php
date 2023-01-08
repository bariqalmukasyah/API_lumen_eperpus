<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua Buku',
            'data'    => $buku
        ], 200);
    }
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'judul'   => 'required',
        'tahun_terbit' => 'required',
        'jumlah' => 'required',
        'isbn' => 'required',
        'pengarang_id' => 'required',
        'penerbit_id' => 'required',
        'rak_kode_rak' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $buku = Buku::create([
            'judul'     => $request->input('judul'),
            'tahun_terbit'   => $request->input('tahun_terbit'),
            'jumlah'   => $request->input('jumlah'),
            'isbn'   => $request->input('isbn'),
            'pengarang_id'   => $request->input('pengarang_id'),
            'penerbit_id'   => $request->input('penerbit_id'),
            'rak_kode_rak'   => $request->input('rak_kode_rak'),
        ]);

        if ($buku) {
            return response()->json([
                'success' => true,
                'message' => 'Buku Berhasil Disimpan!',
                'data' => $buku
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Buku Gagal Disimpan!',
            ], 400);
        }

    }
}
public function show($id)
{
   $buku = Buku::find($id);

   if ($buku) {
       return response()->json([
           'success'   => true,
           'message'   => 'Detail Buku!',
           'data'      => $buku
       ], 200);
   } else {
       return response()->json([
           'success' => false,
           'message' => 'Buku Tidak Ditemukan!',
       ], 404);
   }
}
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'judul'   => 'required',
        'tahun_terbit' => 'required',
        'jumlah' => 'required',
        'isbn' => 'required',
        'pengarang_id' => 'required',
        'penerbit_id' => 'required',
        'rak_kode_rak' => 'required',
    ]);

    if ($validator->fails()) {

        return response()->json([
            'success' => false,
            'message' => 'Semua Kolom Wajib Diisi!',
            'data'   => $validator->errors()
        ],401);

    } else {

        $buku = Buku::whereId($id)->update([
            'judul'     => $request->input('judul'),
            'tahun_terbit'   => $request->input('tahun_terbit'),
            'jumlah'   => $request->input('jumlah'),
            'isbn'   => $request->input('isbn'),
            'pengarang_id'   => $request->input('pengarang_id'),
            'penerbit_id'   => $request->input('penerbit_id'),
            'rak_kode_rak'   => $request->input('rak_kode_rak'),
        ]);

        if ($buku) {
            return response()->json([
                'success' => true,
                'message' => 'Buku Berhasil Diupdate!',
                'data' => $buku
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Buku Gagal Diupdate!',
            ], 400);
        }

    }
}
public function destroy($id)
{
    $buku = Buku::whereId($id)->first();
		
$buku->delete();

    if ($buku) {
        return response()->json([
            'success' => true,
            'message' => 'Buku Berhasil Dihapus!',
        ], 200);
    }

}
}