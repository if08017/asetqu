<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use PDF;
use App\Models\Barang;
use App\Models\Report;
use App\Models\Pegawai;

class PDFController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
    return view('laporan');
  }
  public function inventaris_all(){
    $barangs = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
    ->join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
    ->join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
    ->select('barang.*', DB::raw('COUNT(barang.id) as total_barang'), DB::raw('SUM(barang.price) as total_price'),'golongan_barang.code as golongan_barang_code', 'bidang_barang.code as bidang_barang_code', 'bidang_barang.name as bidang_barang_name','kelompok_barang.code as kelompok_barang_code', DB::raw('GROUP_CONCAT(kelompok_barang.name) as kelompok_barang_name'))
    ->groupBy('kelompok_barang_code')
    // , 'bidang_barang_id', 'kelompok_barang_id','bidang_barang_name', 'kelompok_barang_name', 'golongan_barang_code', 'bidang_barang_code')
    ->orderBy('golongan_barang_code', 'asc')
    // ->havingRaw('COUNT(barang.id) > 0')
    ->get();

    $golongans = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
    ->select(DB::raw('SUM(barang.price) as total_price'), 'golongan_barang.code as golongan_barang_code')
    ->groupBy('golongan_barang_code')
    ->orderBy('golongan_barang_code', 'asc')
    ->get();

    $pdf=PDF::loadView('pdf.inventaris', ['barangs' => $barangs, 'golongans' => $golongans]);
    return $pdf->stream('Inventaris_All.pdf');
    // return view('pdf.inventaris', ['barangs' => $barangs, 'golongans' => $golongans]);
  }
  public function inventaris_pdf($id){
    if($id == 1){
      $barangs = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
      ->join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
      ->join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
      ->select('barang.*', DB::raw('COUNT(barang.id) as total_barang'), DB::raw('SUM(barang.price) as total_price'),'golongan_barang.code as golongan_barang_code', 'bidang_barang.code as bidang_barang_code', 'bidang_barang.name as bidang_barang_name','kelompok_barang.code as kelompok_barang_code', DB::raw('GROUP_CONCAT(DISTINCT(kelompok_barang.name)) as kelompok_barang_name'))
      ->groupBy('bidang_barang_code')
      // , 'bidang_barang_id', 'kelompok_barang_id','bidang_barang_name', 'kelompok_barang_name', 'golongan_barang_code', 'bidang_barang_code')
      ->orderBy('golongan_barang_code', 'asc')
      // ->havingRaw('COUNT(barang.id) > 0')
      ->get();

      $golongans = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
      ->select(DB::raw('SUM(barang.price) as total_price'), 'golongan_barang.code as golongan_barang_code')
      ->groupBy('golongan_barang_code')
      ->orderBy('golongan_barang_code', 'asc')
      ->get();

      $pdf=PDF::loadView('pdf.inventaris', ['barangs' => $barangs, 'golongans' => $golongans]);
      return $pdf->download('Inventaris Tahun Ini.pdf');
    }
    elseif($id == 2) {
      $barangs = Barang::join('pegawai','pegawai_id','=','pegawai.id')
      ->select('barang.*','pegawai.name as pegawai_name')
      ->where('status_name','aktif')
      ->orWhere('status_name','Dalam usulan penghapusan')
      ->orderBy('code', 'asc')
      ->get();

      $pdf=PDF::loadView('pdf.inventaris2', ['barangs' => $barangs])->setPaper('a4', 'landscape');
      return $pdf->download('Inventaris Aset Aktif dan usulan penghapusan.pdf');
    }
    elseif ($id == 3) {
      return 'c';
    }
  }
  public function inventaris_bulanan(){
    $pdf=PDF::loadView('pdf.inventaris', []);
    return $pdf->stream('Inventaris_Bulanan.pdf');
  }
  public function getPDF(){
    $kategoris = Barang::all();
    $pdf=PDF::loadView('pdf.customer', ['kategoris' => $kategoris]);
    // return $pdf->download('customer.pdf');
    return $pdf->stream('customer.pdf');
  }
}
