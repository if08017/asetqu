<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('home');
Route::get('/search/autocomplete', ['uses' => 'HomeController@autocomplete', 'as' => 'search.autocomplete']);

Route::get('/kelola', 'UserController@index');
Route::post('/kelola/add', 'UserController@user_add');
Route::get('/kelola/{id}/edit', 'UserController@user_edit');
Route::get('/kelola/{id}/delete', 'UserController@user_delete');


Route::get('/pdf', 'PDFController@index');
Route::get('/excel', 'ExcelController@index');
Route::get('/inventaris', 'PDFController@inventaris_all');

Route::get('/laporan', 'ReportController@index');
Route::get('/laporan/inventaris/pdf', 'PDFController@inventaris_pertahun');
Route::get('/laporan/inventaris_aktif_usulan/pdf', 'PDFController@inventaris_aktif_usulan');
Route::get('/laporan/inventaris_usulan/pdf', 'PDFController@inventaris_usulan');
Route::get('/laporan/inventaris_mutasi_hapus/pdf', 'PDFController@inventaris_mutasi_hapus');
Route::post('/laporan/inventaris_perpengguna/pdf', 'PDFController@inventaris_perpengguna');
Route::post('/laporan/inventaris_perjenis/pdf', 'PDFController@inventaris_perjenis');
Route::post('/laporan/inventaris_perjenis_persatuan_kerja/pdf', 'PDFController@inventaris_perjenis_persatuan_kerja');
Route::get('/laporan/{id}/excel', 'ExcelController@inventaris_excel');
Route::get('/laporan/inventaris/{id}/pdf', 'PDFController@inventaris_all');
Route::get('/laporan/inventaris/mingguan', 'PDFController@inventaris_mingguan');
Route::get('//laporan/inventaris/bulanan', 'PDFController@inventaris_bulanan');

// Route::get('/kategori', 'KategoriController@kategori');
// Route::get('/kategori/add', 'KategoriController@kategori_add');
// Route::post('/kategori/insert', 'KategoriController@kategori_insert');
// Route::get('/kategori/{id}', 'KategoriController@kategori_show');
// Route::get('/kategori/{id}/edit', 'KategoriController@kategori_edit');
// Route::put('/kategori/{id}', 'KategoriController@kategori_update');
// Route::get('/kategori/{id}/delete', 'KategoriController@kategori_delete');

Route::get('/inventori', 'InventoriController@index');
Route::get('/inventori/{id}/view', 'InventoriController@inventori_view');
Route::get('/inventori/{id}/{golongan_barang_id}/{bidang_barang_id}/{kelompok_barang_id}/edit', 'InventoriController@inventori_edit');
Route::get('/inventori/{id}/delete', 'InventoriController@inventori_delete');
Route::get('/inventori/add', 'InventoriController@inventori_add');
Route::post('/inventori/insert', 'InventoriController@inventori_insert');
Route::put('/inventori/{id}', 'InventoriController@inventori_update');
// Route::post('/inventori/insert', 'InventoriController@inventori_insert');

Route::get('/bhp', 'BarangHabisPakaiController@index');
Route::get('/bhp/add', 'BarangHabisPakaiController@bhp_add');
Route::post('/bhp/insert', 'BarangHabisPakaiController@bhp_insert');


Route::get('/barang/golongan', 'GolonganController@index');
// Route::get('/barang/golongan/add', 'GolonganController@add');
Route::post('/barang/golongan/insert', 'GolonganController@insert');
Route::put('/barang/golongan/{id}', 'GolonganController@update');
Route::get('/barang/golongan/{id}/edit', 'GolonganController@edit');
Route::get('/barang/golongan/{id}/delete', 'GolonganController@golongan_delete');

Route::get('/barang/kelompok', 'KelompokController@index');
// Route::get('/barang/golongan/add', 'GolonganController@add');
Route::post('/barang/kelompok/insert', 'KelompokController@kelompok_insert');
Route::put('/barang/kelompok/{id}', 'KelompokController@kelompok_update');
Route::get('/barang/kelompok/{id}/edit', 'KelompokController@kelompok_edit');
Route::get('/barang/kelompok/{id}/delete', 'KelompokController@kelompok_delete');

Route::get('/barang/subkelompok', 'KelompokController@index');
Route::post('/barang/subkelompok/insert', 'KelompokController@subkelompok_insert');
Route::put('/barang/subkelompok/{id}', 'KelompokController@subkelompok_update');
Route::get('/barang/subkelompok/{id}/edit', 'KelompokController@subkelompok_edit');
Route::get('/barang/subkelompok/{id}/delete', 'KelompokController@subkelompok_delete');

Route::get('/barang/bidang', 'GolonganController@index');
// Route::get('/barang/bidang/add', 'GolonganController@add');
Route::post('/barang/bidang/insert', 'GolonganController@bidang_insert');
Route::put('/barang/bidang/{id}', 'GolonganController@bidang_update');
Route::get('/barang/bidang/{id}/edit', 'GolonganController@bidang_edit');
Route::get('/barang/bidang/{id}/delete', 'GolonganController@bidang_delete');



Route::get('/barang/ajax-bidang', 'BarangController@bidang_barang');
Route::get('/barang/ajax-kelompok', 'BarangController@kelompok_barang');
Route::get('/barang/ajax-sub-kelompok', 'BarangController@sub_kelompok_barang');
Route::get('/barang/ajax-nama-barang', 'BarangController@nama_barang');

Route::get('/barang/mutation', 'BarangController@mutation_view');
Route::get('/barang/ajax-mutation', 'BarangController@mutation_barang');
Route::get('/barang/mutation/autocomplete', ['uses' => 'BarangController@mutation_autocomplete', 'as' => 'barang.mutation.autocomplete']);
Route::post('/barang/mutation/insert', 'BarangController@mutation_barang_insert');

Route::get('/barang/masuk', 'BarangController@barang_masuk');
Route::get('/barang/masuk/add', 'BarangController@barang_masuk_add');
Route::post('/barang/masuk/insert', 'BarangController@barang_masuk_insert');
Route::get('/barang/masuk/{id}/view', 'BarangController@barang_masuk_view');
Route::get('/barang/masuk/{id}/edit', 'BarangController@barang_masuk_edit');
Route::put('/barang/masuk/{id}', 'BarangController@barang_masuk_update');
Route::get('/barang/masuk/{id}/delete', 'BarangController@barang_masuk_delete');

Route::get('/barang/keluar', 'BarangController@barang_keluar');
Route::get('/barang/keluar/add', 'BarangController@barang_keluar_add');
Route::post('/barang/keluar/insert', 'BarangController@barang_keluar_insert');
Route::get('/barang/keluar/{id}/edit', 'BarangController@barang_keluar_edit');
Route::put('/barang/keluar/{id}', 'BarangController@barang_keluar_update');
Route::get('/barang/keluar/{id}/delete', 'BarangController@barang_keluar_delete');

Route::get('/barang', 'BarangController@index');
Route::get('/barang/{id}/view', 'BarangController@barang_view');
Route::get('/barang/{id}/{golongan_barang_id}/{bidang_barang_id}/{kelompok_barang_id}/edit', 'BarangController@barang_edit');
Route::get('/barang/{id}/delete', 'BarangController@barang_delete');
Route::get('/barang/add', 'BarangController@barang_add');
Route::post('/barang/insert', 'BarangController@barang_insert');
Route::put('/barang/{id}', 'BarangController@barang_update');
Route::get('/barang/{id}', 'BarangController@view');

Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/add', 'PegawaiController@add');
Route::post('/pegawai/insert', 'PegawaiController@insert');
Route::get('/pegawai/{id}/view', 'PegawaiController@view');
Route::get('/pegawai/{id}/edit', 'PegawaiController@edit');
Route::get('/pegawai/{id}/delete', 'PegawaiController@delete');
Route::get('/pegawai/ajax-kab', 'PegawaiController@kabupaten');
Route::get('/pegawai/ajax-satuan', 'PegawaiController@satuan_kerja');
Route::put('/pegawai/{id}', 'PegawaiController@update');
Route::get('/pegawai/{id}', 'PegawaiController@view');


Route::get('/management', 'ManagementController@index');
// Route::get('/management/ruangan', 'ManagementController@ruangan');
Route::post('/management/ruangan/insert', 'ManagementController@ruangan_insert');
Route::put('/management/ruangan/{id}', 'ManagementController@ruangan_update');
Route::get('/management/ruangan/{id}/edit', 'ManagementController@ruangan_edit');
Route::get('/management/ruangan/{id}/delete', 'ManagementController@ruangan_delete');
// Route::get('/management/jabatan', 'ManagementController@jabatan');
Route::post('/management/jabatan/insert', 'ManagementController@jabatan_insert');
Route::put('/management/jabatan/{id}', 'ManagementController@jabatan_update');
Route::get('/management/jabatan/{id}/edit', 'ManagementController@jabatan_edit');
Route::get('/management/jabatan/{id}/delete', 'ManagementController@jabatan_delete');


Route::get('/bidang', 'BidangController@index');
Route::post('/bidang/satuankerja/insert', 'BidangController@satuan_kerja_insert');
Route::put('/bidang/satuankerja/{id}', 'BidangController@satuan_kerja_update');
Route::get('/bidang/satuankerja/{id}/edit', 'BidangController@satuan_kerja_edit');
Route::get('/bidang/satuankerja/{id}/delete', 'BidangController@satuan_kerja_delete');

Route::post('/bidang/unitkerja/insert', 'BidangController@unit_kerja_insert');
Route::put('/bidang/unitkerja/{id}', 'BidangController@unit_kerja_update');
Route::get('/bidang/unitkerja/{id}/edit', 'BidangController@unit_kerja_edit');
Route::get('/bidang/unitkerja/{id}/delete', 'BidangController@unit_kerja_delete');
