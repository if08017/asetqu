<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use PDF;
use App\Models\Barang;
use App\Models\Report;
use App\Models\Pegawai;
use App\Models\Ruangan;
use App\Models\Golongan;
use App\Models\Bidang;
use App\Models\Satuankerja;

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
    ->select('barang.*', DB::raw('COUNT(barang.id) as total_barang'), DB::raw('SUM(barang.price) as total_price'),'golongan_barang.code as golongan_barang_code', 'bidang_barang.code as bidang_barang_code', 'bidang_barang.name as bidang_barang_name','kelompok_barang.code as kelompok_barang_code', DB::raw('GROUP_CONCAT(DISTINCT(kelompok_barang.name)) as kelompok_barang_name'))
    ->whereYear('barang.created_at','=',date('Y'))
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
  public function inventaris_pertahun(){
    // 1
    $barangs = Barang::join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
    ->join('bidang_barang','bidang_barang_id','=','bidang_barang.id')
    ->join('kelompok_barang','kelompok_barang_id','=','kelompok_barang.id')
    ->select('barang.*', DB::raw('COUNT(barang.id) as total_barang'), DB::raw('SUM(barang.price) as total_price'),'golongan_barang.code as golongan_barang_code', 'bidang_barang.code as bidang_barang_code', 'bidang_barang.name as bidang_barang_name','kelompok_barang.code as kelompok_barang_code', DB::raw('GROUP_CONCAT(DISTINCT(kelompok_barang.name)) as kelompok_barang_name'))
    ->whereYear('barang.created_at','=',date('Y'))
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

    $pdf=PDF::loadView('pdf.inventaris', ['barangs' => $barangs, 'golongans' => $golongans])->setPaper('a4', 'landscape');
    return $pdf->stream('Inventaris Tahun '.date('Y').'.pdf');
  }
  public function inventaris_aktif_usulan(){
    // 2
    $barangs = Barang::join('pegawai','pegawai_id','=','pegawai.id')
    ->select('barang.*','pegawai.name as pegawai_name')
    ->where('status_name','aktif')
    ->orWhere('status_name','Dalam usulan penghapusan')
    ->orderBy('code', 'asc')
    ->get();

    $pdf=PDF::loadView('pdf.inventaris2', ['barangs' => $barangs])->setPaper('a4', 'landscape');
    return $pdf->stream('Inventaris Aset Aktif dan usulan penghapusan.pdf');
  }
  public function inventaris_usulan(){
    //3
    $barangs = Barang::join('pegawai','pegawai_id','=','pegawai.id')
    ->join('ruangan','ruangan_id','=','ruangan.id')
    ->select('barang.*','pegawai.name as pegawai_name','ruangan.code as ruangan_code')
    ->where('status_name','Dalam usulan penghapusan')
    ->orderBy('code', 'asc')
    ->get();

    $pdf=PDF::loadView('pdf.inventaris3', ['barangs' => $barangs])->setPaper('a4', 'landscape');
    return $pdf->stream('Inventaris Aset Dalam Usulan Penghapusan.pdf');
  }
  public function inventaris_mutasi_hapus(){
    //4
    $barangs = Barang::join('pegawai','pegawai_id','=','pegawai.id')
    ->join('ruangan','ruangan_id','=','ruangan.id')
    ->select('barang.*','pegawai.name as pegawai_name','ruangan.code as ruangan_code')
    ->where('status_name','Mutasi Pindah')
    ->orWhere('status_name','Dihapuskan')
    ->orderBy('code', 'asc')
    ->get();
    $pdf=PDF::loadView('pdf.inventaris4', ['barangs' => $barangs])->setPaper('a4', 'landscape');
    return $pdf->stream('Inventaris Aset Dalam Usulan Penghapusan.pdf');
  }
  public function inventaris_perpengguna(Request $request){
    //5
    $pegawais = Pegawai::where('id', $request->pengguna)->first();
    $barangs = Barang::join('pegawai','pegawai_id','=','pegawai.id')
    // ->join('receipt','receipt_id','=','receipt.id')
    ->join('golongan_barang','golongan_barang_id','=','golongan_barang.id')
    ->select('barang.*','pegawai.name as pegawai_name','golongan_barang.name as golongan_name')
    ->where('pegawai_id',$request->pengguna)
    ->whereNotIn('golongan_barang_id',[1])
    ->orderBy('code', 'asc')
    ->get();

    $pdf=PDF::loadView('pdf.inventaris5', ['barangs' => $barangs, 'pegawai' => $pegawais])->setPaper('a4', 'landscape');
    return $pdf->stream('Inventaris_Bulanan.pdf');
  }
  public function inventaris_perjenis(Request $request){
    //6
    $barangs = Barang::where('bidang_barang_id',$request->bidang)
    ->select('barang.*', DB::raw('SUM(barang.quantity) as jumlah_barang'), DB::raw('SUM(barang.price) as total_harga'))
    ->groupBy('barang.code')
    ->orderBy('code', 'asc')
    ->get();
    $pdf=PDF::loadView('pdf.inventaris6', ['barangs' => $barangs])->setPaper('a4', 'landscape');
    return $pdf->stream('Inventaris_Bulanan.pdf');
  }
  public function inventaris_perjenis_persatuan_kerja(Request $request){
    //7
    // dd($request);
    // $bidangs = Bidang::where('id', $request->bidang)->first();
    // $satuankerjas = Satuankerja::where('id', $request->satuan)->first();
    // $barangs = Barang::join('bidang_barang','barang.bidang_barang_id','=','bidang_barang.id')
    //           ->join('pegawai','pegawai_id','=','pegawai.id')
    //           ->get();
    // $grouped = $barangs->groupBy('golongan_barang_id')->sortBy('code')->toArray();
    // // $total_masuk = $grouped->count();
    // dd($grouped);

    $barangs_meta = Barang::join('bidang_barang','barang.bidang_barang_id','=','bidang_barang.id')
    ->join('pegawai','pegawai_id','=','pegawai.id')
    ->select('barang.*')
    ->where([
      ['barang.golongan_barang_id',1],
      ['barang.bidang_barang_id',$request->bidang],
      ['pegawai.satuan_kerja_id',$request->satuan]
    ])
    // ->groupBy('barang.code')
    ->orderBy('barang.code', 'asc')
    ->get();
    $barangs = $barangs_meta->groupBy('code');
    $masuk = $barangs->sum('quantity');
    $barangs2 = $barangs_meta->unique('code');
    dd($masuk);

    $pdf=PDF::loadView('pdf.inventaris7', ['barangs_meta'=>$barangs_meta, 'barangs' => $barangs])->setPaper('a4', 'landscape');
    return $pdf->stream('Inventaris_Bulanan.pdf');
  }
  public function getPDF(){
    $kategoris = Barang::all();
    $pdf=PDF::loadView('pdf.customer', ['kategoris' => $kategoris]);
    // return $pdf->download('customer.pdf');
    return $pdf->stream('customer.pdf');
  }
}
