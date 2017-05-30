<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\Satuankerja;


class ReportController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    $pegawais = Pegawai::orderBy('name', 'asc')->get();
    $bidangs = Bidang::orderBy('name', 'asc')->get();
    $bidangs_barang_habis_pakai = Bidang::where('golongan_barang_id',1)->orderBy('name', 'asc')->get();
    $satuankerjas = Satuankerja::orderBy('name', 'asc')->get();
    return view('laporan',['pegawais'=>$pegawais, 'bidangs'=>$bidangs, 'bidangs_barang_habis_pakai'=>$bidangs_barang_habis_pakai, 'satuankerjas'=>$satuankerjas]);
  }
  public function inventaris_pdf($id){
    $reports=Report::where('id',$id)->first();
    dd($reports);
    return view('laporan',['reports'=>$reports]);
  }
}
