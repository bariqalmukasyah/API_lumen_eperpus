<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

$router->get('/anggota', 'AnggotaController@index');
$router->post('/anggota', 'AnggotaController@store');
$router->get('/anggota/{id}', 'AnggotaController@show');
$router->put('/anggota/{id}', 'AnggotaController@update');
$router->delete('/anggota/{id}', 'AnggotaController@destroy');

$router->get('/petugas', 'PetugasController@index');
$router->post('/petugas', 'PetugasController@store');
$router->get('/petugas/{id}', 'PetugasController@show');
$router->put('/petugas/{id}', 'PetugasController@update');
$router->delete('/petugas/{id}', 'PetugasController@destroy');

$router->get('/buku', 'BukuController@index');
$router->post('/buku', 'BukuController@store');
$router->get('/buku/{id}', 'BukuController@show');
$router->put('/buku/{id}', 'BukuController@update');
$router->delete('/buku/{id}', 'BukuController@destroy');

$router->get('/peminjaman', 'PeminjamanController@index');
$router->post('/peminjaman', 'PeminjamanController@store');
$router->get('/peminjaman/{id}', 'PeminjamanController@show');
$router->put('/peminjaman/{id}', 'PeminjamanController@update');
$router->delete('/peminjaman/{id}', 'PeminjamanController@destroy');

$router->get('/peminjaman_detail', 'Peminjaman_detailController@index');
$router->post('/peminjaman_detail', 'Peminjaman_detailController@store');
$router->get('/peminjaman_detail/{id}', 'Peminjaman_detailController@show');
$router->put('/peminjaman_detail/{id}', 'Peminjaman_detailController@update');
$router->delete('/peminjaman_detail/{id}', 'Peminjaman_detailController@destroy');

$router->get('/penerbit', 'PenerbitController@index');
$router->post('/penerbit', 'PenerbitController@store');
$router->get('/penerbit/{id}', 'PenerbitController@show');
$router->put('/penerbit/{id}', 'PenerbitController@update');
$router->delete('/penerbit/{id}', 'PenerbitController@destroy');

$router->get('/pengarang', 'PengarangController@index');
$router->post('/pengarang', 'PengarangController@store');
$router->get('/pengarang/{id}', 'PengarangController@show');
$router->put('/pengarang/{id}', 'PengarangController@update');
$router->delete('/pengarang/{id}', 'PengarangController@destroy');

$router->get('/pengembalian', 'PengembalianController@index');
$router->post('/pengembalian', 'PengembalianController@store');
$router->get('/pengembalian/{id}', 'PengembalianController@show');
$router->put('/pengembalian/{id}', 'PengembalianController@update');
$router->delete('/pengembalian/{id}', 'PengembalianController@destroy');

$router->get('/pengembalian_detail', 'Pengembalian_detailController@index');
$router->post('/pengembalian_detail', 'Pengembalian_detailController@store');
$router->get('/pengembalian_detail/{id}', 'Pengembalian_detailController@show');
$router->put('/pengembalian_detail/{id}', 'Pengembalian_detailController@update');
$router->delete('/pengembalian_detail/{id}', 'Pengembalian_detailController@destroy');

$router->get('/rak', 'RakController@index');
$router->post('/rak', 'RakController@store');
$router->get('/rak/{id}', 'RakController@show');
$router->put('/rak/{id}', 'RakController@update');
$router->delete('/rak/{id}', 'RakController@destroy');


















