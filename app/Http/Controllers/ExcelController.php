<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use App\Models\Report;
use App\Models\Barang;

class ExcelController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index(){
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

    $test = 'koks';
    Excel::create('Laravel Excel', function($excel) use ($barangs, $golongans, $test) {
      $excel->sheet('Excel sheet', function($sheet) use ($barangs, $golongans, $test) {
        $sheet->loadView('pdf.inventaris')->with('barangs', $barangs)
                                        ->with('koks', $test)
                                        ->with('golongans', $golongans);
        $sheet->setOrientation('landscape');
        // $sheet->fromModel(Report::orderBy('id', 'asc')->get());
      });
    })->export('xls');
  }
}
